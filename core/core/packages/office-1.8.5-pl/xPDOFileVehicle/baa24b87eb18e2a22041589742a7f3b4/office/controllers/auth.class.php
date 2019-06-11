<?php /** @noinspection PhpUndefinedMethodInspection */

class officeAuthController extends officeDefaultController
{

    /**
     * Default config
     *
     * @param array $config
     */
    public function setDefault($config = array())
    {
        if (defined('MODX_ACTION_MODE') && MODX_ACTION_MODE && !empty($_SESSION['Office']['Auth'][$this->modx->context->key])) {
            $this->config = $_SESSION['Office']['Auth'][$this->modx->context->key];
            $this->config['json_response'] = true;
        } else {
            $this->config = array_merge(array(
                'tplLogin' => 'tpl.Office.auth.login',
                'tplLogout' => 'tpl.Office.auth.logout',
                'tplActivate' => 'tpl.Office.auth.activate',
                'tplRegister' => 'tpl.Office.auth.register',

                'siteUrl' => $this->modx->getOption('site_url'),
                'linkTTL' => 600,
                'page_id' => $this->modx->getOption('office_auth_page_id'),

                'groups' => '',
                'loginResourceId' => 0,
                'logoutResourceId' => 0,
                'rememberme' => true,
                'loginContext' => '',
                'addContexts' => '',

                'HybridAuth' => true,
                'providerTpl' => 'tpl.HybridAuth.provider',
                'activeProviderTpl' => 'tpl.HybridAuth.provider.active',

                'gravatarUrl' => 'https://gravatar.com/avatar/',
            ), $config);
        }

        // Save main page_id if not exists. It will be used for another contexts that has no snippet call
        /** @var modSystemSetting $setting */
        if (!$setting = $this->modx->getObject('modSystemSetting', 'office_auth_page_id')) {
            $setting = $this->modx->newObject('modSystemSetting');
            $setting->set('key', 'office_auth_page_id');
            $setting->set('value', $this->modx->resource->id);
            $setting->set('namespace', 'office');
            $setting->set('area', 'office_auth');
            $setting->save();
        }

        if (empty($this->config['loginContext'])) {
            $this->config['loginContext'] = $this->modx->context->key;
        }
        $_SESSION['Office']['Auth'][$this->modx->context->key] = $this->config;
    }


    /**
     * Returns array with language topics
     *
     * @return array
     */
    public function getLanguageTopics()
    {
        return array('office:auth');
    }


    /**
     * Returns login form
     *
     * @return string
     */
    public function defaultAction()
    {
        if ($this->modx->resource->id && $this->modx->resource->id != $this->config['page_id']) {
            // Save page_id for current context
            /** @var modContextSetting $setting */
            $key = array('key' => 'office_auth_page_id', 'context_key' => $this->modx->context->key);
            if (!$setting = $this->modx->getObject('modContextSetting', $key)) {
                $setting = $this->modx->newObject('modContextSetting');
            }
            // It will be updated on every snippet call
            $setting->fromArray($key, '', true, true);
            $setting->set('value', $this->modx->resource->id);
            $setting->set('namespace', 'office');
            $setting->set('area', 'office_auth');
            $setting->save();

            $this->config['page_id'] = $this->modx->resource->id;
        }

        $config = $this->office->pdoTools->makePlaceholders($this->office->config);
        if ($css = trim($this->modx->getOption('office_auth_frontend_css'))) {
            $this->modx->regClientCSS(str_replace($config['pl'], $config['vl'], $css));
        }
        if ($js = trim($this->modx->getOption('office_auth_frontend_js', null, '[[+jsUrl]]auth/default.js'))) {
            $this->modx->regClientScript(str_replace($config['pl'], $config['vl'], $js));
        }

        $pls = array();
        if ($this->config['HybridAuth'] && file_exists(MODX_CORE_PATH . 'components/hybridauth/')) {
            if ($this->modx->loadClass('hybridauth', MODX_CORE_PATH . 'components/hybridauth/model/hybridauth/', false,
                true)
            ) {
                $HybridAuth = new HybridAuth($this->modx, $this->config);
                $HybridAuth->initialize($this->modx->context->key);
                $pls['providers'] = $HybridAuth->getProvidersLinks($this->config['providerTpl'],
                    $this->config['activeProviderTpl']);
            }
        }

        if (!$this->modx->user->isAuthenticated($this->modx->context->key)) {
            // Redirect after authorization
            if (!empty($_GET['hauth_return']) && !$this->modx->user->isAuthenticated($this->modx->context->key)) {
                $url = parse_url($_GET['hauth_return']);
                if (!empty($url['path'])) {
                    $_SESSION['Office']['ReturnTo'][$this->modx->context->key] = $url['path'];
                }
            }
            // Login errors
            if (!empty($_SESSION['Office']['Auth']['error'])) {
                $pls['error'] = $_SESSION['Office']['Auth']['error'];
            } elseif (!empty($_SESSION['HA']['error'])) {
                $pls['error'] = $_SESSION['HA']['error'];
            } elseif (!empty($_SESSION['Office']['Auth']['error']) && !empty($_SESSION['HA']['error'])) {
                $pls['error'] = $_SESSION['Office']['Auth']['error'] . '<br/>' . $_SESSION['HA']['error'];
            }
            unset($_SESSION['Office']['Auth']['error'], $_SESSION['HA']['error']);

            return $this->office->pdoTools->getChunk($this->config['tplLogin'], $pls);
        } else {
            $user = $this->modx->user->toArray();
            $profile = $this->modx->user->Profile->toArray();
            $pls = array_merge($pls, $profile, $user);
            $pls['gravatar'] = $this->config['gravatarUrl'] . md5(strtolower($profile['email']));
            if (!empty($_SESSION['Office']['LoggedIn'])) {
                $pls['authorized'] = array();
                foreach ($_SESSION['Office']['LoggedIn'] as $id => $hash) {
                    if ($id == $this->modx->user->id) {
                        continue;
                    }
                    $user = $this->modx->getObjectGraph('modUser', '{"Profile":{}}', array(
                        'modUser.id' => $id,
                        'modUser.active' => true,
                        'Profile.blocked' => false,
                    ));
                    if ($user) {
                        $data = array_merge($user->Profile->toArray(), $user->toArray());
                        $data['gravatar'] = $this->config['gravatarUrl'] . md5(strtolower($user->Profile->email));
                        $pls['authorized'][$id] = $data;
                    }
                }
            }

            return $this->office->pdoTools->getChunk($this->config['tplLogout'], $pls);
        }
    }


    /**
     * Login existing user or reset his password
     *
     * @param array $data
     *
     * @return array|string
     */
    public function formLogin(array $data)
    {
        // Check user status
        if ($this->modx->user->isAuthenticated($this->modx->context->key)) {
            return $this->success(
                $this->modx->lexicon('office_auth_err_already_logged'),
                array('refresh' => $this->_getLoginLink())
            );
        } elseif (!$this->office->checkCsrfToken(@$data['csrf'])) {
            return $this->error('office_err_csrf');
        }

        if (!$profile = $this->checkLogin($data)) {
            return $this->error($this->modx->lexicon('office_auth_err_email_username_nf'));
        } elseif ($profile instanceof modUserProfile) {
            /** @var modUser $user */
            $user = $profile->getOne('User');
            $password = trim(@$data['password']);

            // If user did not activate his account - try to send link again
            if (!$user->get('active')) {
                $reset = $this->_resetPassword($user->username);
                if (!empty($this->config['json_response'])) {
                    $reset = json_decode($reset, true);
                }
                if ($reset['success']) {
                    $reset['message'] = $this->modx->lexicon('office_auth_err_user_active');

                    return $this->success($reset['message']);
                } else {
                    return $this->error($reset['message'], $reset['data']);
                }
            } // If user did not send password - he wants to reset it
            elseif (empty($password)) {
                if ($this->modx->getOption('office_auth_mode') == 'phone') {
                    if (!empty($data['phone_code']) && is_numeric($data['phone_code'])) {
                        $data['mobilephone'] = $profile->mobilephone;

                        return $this->Login($data);
                    }
                }

                return $this->_resetPassword($user->username);
            }

            // Otherwise we try to login
            $login_data = array(
                'username' => $user->get('username'),
                'password' => $password,
                'rememberme' => $this->config['rememberme'],
                'login_context' => $this->config['loginContext'],
            );
            if (!empty($this->config['addContexts'])) {
                $login_data['add_contexts'] = $this->config['addContexts'];
            }

            $response = $this->modx->runProcessor('security/login', $login_data);
            if ($response->isError()) {
                $errors = $this->_formatProcessorErrors($response);
                $this->modx->log(modX::LOG_LEVEL_INFO,
                    '[Office] unable to login user "' . $data['username'] . '". Message: ' . $errors
                );

                return $this->error($this->modx->lexicon('office_auth_err_login', array('errors' => $errors)));
            } else {
                return $this->success(
                    $this->modx->lexicon('office_auth_success'),
                    array('refresh' => $this->_getLoginLink())
                );
            }
        } else {
            return $this->error($this->modx->lexicon('office_auth_err_email_username_nf'));
        }
    }


    /**
     * @param array $data
     *
     * @return array|string
     */
    public function formAdd(array $data)
    {
        // Check user status
        if (!$this->modx->user->isAuthenticated($this->modx->context->key)) {
            return $this->error('office_auth_err_add_login', array('refresh' => $this->_getLoginLink()));
        } elseif (!$this->office->checkCsrfToken(@$data['csrf'])) {
            return $this->error('office_err_csrf');
        }

        if (!$profile = $this->checkLogin($data)) {
            return $this->error('office_auth_err_email_username_nf');
        } elseif ($profile->internalKey == $this->modx->user->id) {
            return $this->error('office_auth_err_add_same');
        }
        /** @var modUser $user */
        $user = $profile->getOne('User');
        $password = trim(@$data['password']);

        if (!$user->get('active')) {
            return $this->error('office_auth_err_add_active');
        }
        // Try to login
        $login_data = array(
            'username' => $user->get('username'),
            'password' => $password,
            'rememberme' => $this->config['rememberme'],
            'login_context' => $this->config['loginContext'],
        );
        if (!empty($this->config['addContexts'])) {
            $login_data['add_contexts'] = $this->config['addContexts'];
        }

        if (!class_exists('modProcessor')) {
            /** @noinspection PhpIncludeInspection */
            require MODX_CORE_PATH . 'model/modx/modprocessor.class.php';
        }
        if (!class_exists('modSecurityLoginProcessor')) {
            /** @noinspection PhpIncludeInspection */
            require MODX_CORE_PATH . 'model/modx/processors/security/login.class.php';
        }
        /** @var modSecurityLoginProcessor $loginProcessor */
        $loginProcessor = new modSecurityLoginProcessor($this->modx, $login_data);
        $loginProcessor->initialize();
        $topics = $loginProcessor->getLanguageTopics();
        foreach ($topics as $topic) {
            $this->modx->lexicon->load($topic);
        }
        $loginProcessor->getUser();
        $check = $loginProcessor->checkIsBlocked();
        if ($check !== false) {
            return $this->error($check);
        }
        $check = $loginProcessor->checkPassword(false);
        if ($check !== false) {
            return $this->error($check);
        }
        if (!isset($_SESSION['Office']['LoggedIn'])) {
            $_SESSION['Office']['LoggedIn'] = array();
        }
        $_SESSION['Office']['LoggedIn'][$this->modx->user->id] = $this->modx->user->password;
        $_SESSION['Office']['LoggedIn'][$user->id] = $user->get('password');

        $loginProcessor->addSessionContexts();
        $this->modx->getUser($this->modx->context->key, true);

        return $this->success(
            'office_auth_add_success',
            array('refresh' => $this->_getLoginLink()),
            $user->get(array('username'))
        );
    }


    /**
     * Create new user and confirm his email
     *
     * @param array $data
     *
     * @return array|string
     */
    public function formRegister(array $data)
    {
        // Check user status
        if ($this->modx->user->isAuthenticated($this->modx->context->key)) {
            return $this->success(
                $this->modx->lexicon('office_auth_err_already_logged'),
                array('refresh' => $this->_getLoginLink())
            );
        } elseif (!$this->office->checkCsrfToken(@$data['csrf'])) {
            return $this->error('office_err_csrf');
        }

        // Check password
        $password = trim(@$data['password']);
        if (!empty($password)) {
            $req = $this->modx->getOption('password_min_length', null, 6);
            if (strlen($password) < $req) {
                return $this->error($this->modx->lexicon('office_auth_err_password_short', array('req' => $req)));
            } elseif (!preg_match('/^[^\'\\x3c\\x3e\\(\\);\\x22]+$/', $password)) {
                return $this->error($this->modx->lexicon('office_auth_err_password_invalid'));
            }
        }
        $email = strtolower(trim(@$data['email']));
        $mobilephone = $this->office->checkPhone(@$data['mobilephone']);
        if ($this->modx->getOption('office_auth_mode') == 'phone') {
            // Check phone
            if (!$mobilephone) {
                return $this->error($this->modx->lexicon('office_auth_err_phone_invalid'));
            }
            if (!empty($data['phone_code']) && is_numeric($data['phone_code'])) {
                return $this->Login($data);
            } elseif ($this->modx->getCount('modUserProfile', array('mobilephone' => $mobilephone))) {
                return $this->error($this->modx->lexicon('office_auth_err_phone_exists'));
            }
        } else {
            // Check email
            if (empty($email)) {
                return $this->error($this->modx->lexicon('office_auth_err_email_ns'));
            }
            $exists = $this->modx->getCount('modUserProfile', array('email' => $email)) ||
                $this->modx->getCount('modUser', array('username' => $email));
            if ($exists) {
                return $this->error($this->modx->lexicon('office_auth_err_email_exists'));
            }
        }

        // Check username
        $username = strtolower(trim(@$data['username']));
        if (!empty($username)) {
            if (!preg_match('/^[^\'\\x3c\\x3e\\(\\);\\x22]+$/', $username)) {
                return $this->error($this->modx->lexicon('office_auth_err_username_invalid'));
            } elseif ($this->modx->getCount('modUser', array('username' => $username))) {
                return $this->error($this->modx->lexicon('office_auth_err_username_exists'));
            }
        } elseif (!empty($email)) {
            $username = $email;
        } elseif (!empty($mobilephone)) {
            $username = $mobilephone;
        }

        // Handle fullname
        $fullname = $this->modx->stripTags(trim(@$data['fullname']));

        return $this->_createUser(array(
            'username' => $username,
            'email' => $email,
            'mobilephone' => $mobilephone,
            'password' => $password,
            'fullname' => $fullname,
        ));
    }


    /**
     * Check email of user and start login process
     *
     * @deprecated
     *
     * @param array $data
     *
     * @return array|string
     */
    public function sendLink(array $data)
    {
        $email = strtolower(trim(@$data['email']));
        if ($this->modx->user->isAuthenticated($this->modx->context->key)) {
            return $this->success(
                $this->modx->lexicon('office_auth_err_already_logged'),
                array('refresh' => $this->_getLoginLink())
            );
        } elseif (!$this->office->checkCsrfToken(@$data['csrf'])) {
            return $this->error('office_err_csrf');
        }
        if (empty($email)) {
            return $this->error($this->modx->lexicon('office_auth_err_email_ns'));
        } elseif (!preg_match('#^[^@а-яА-Я]+@[^@а-яА-Я]+(?<!\.)\.[^\.а-яА-Я]{2,}$#m', $email)) {
            return $this->error($this->modx->lexicon('office_auth_err_email'));
        }

        /** @var modUserProfile $profile */
        if ($profile = $this->modx->getObject('modUserProfile', array('email' => $email))) {
            return $this->_resetPassword($profile->email);
        }

        return $this->_createUser(array(
            'username' => $email,
            'email' => $email,
        ));
    }


    /**
     * Login to site via email or phone code
     *
     * @param array $data
     *
     * @return bool|null|string
     */
    public function Login(array $data)
    {
        /** @var modUser $user */
        $c = $this->modx->newQuery('modUser');
        $c->innerJoin('modUserProfile', 'Profile');
        $mode = 'email';
        if ($this->modx->getOption('office_auth_mode') == 'phone' && !empty($data['phone_code'])) {
            if ($phone = $this->office->checkPhone(@$data['mobilephone'])) {
                $c->where(array('Profile.mobilephone' => $phone));
            } else {
                return $this->error($this->modx->lexicon('office_auth_err_phone_invalid'));
            }
            $mode = 'phone';
        } else {
            $c->where(array('Profile.email' => rawurldecode(@$data['email'])));
        }

        $activate = false;
        if ($user = $this->modx->getObject('modUser', $c)) {
            if ($mode == 'phone') {
                $code = (int)@$data['phone_code'];
                $password = @$_SESSION['Office']['Auth']['cachepwd'];
            } elseif (strpos(@$data['hash'], ':') != false) {
                list($code, $password) = explode(':', rawurldecode(@$data['hash']));
            } else {
                $code = rawurldecode(@$data['hash']);
            }
            $profile = $user->getOne('Profile');
            $extended = $profile->get('extended');
            if ($extended['office_activation_key'] == $code) {
                $activate = $user->activatePassword($code);
            }

            if ($activate === true) {
                unset($_SESSION['Office']['Auth']['cachepwd'], $extended['office_activation_key']);
                $profile->set('extended', $extended);
                if (!$user->get('active')) {
                    $user->set('active', true);
                    if ($user->save()) {
                        $this->modx->invokeEvent('OnUserActivate', array(
                            'id' => $user->id,
                            'user' => &$user,
                            'mode' => modSystemEvent::MODE_UPD,
                        ));
                    }
                } else {
                    $profile->save();
                }

                $this->modx->user = $user;
                $this->modx->user->addSessionContext($this->config['loginContext']);
                if (!empty($this->config['addContexts'])) {
                    $contexts = array_map('trim', explode(',', $this->config['addContexts']));
                    foreach ($contexts as $ctx) {
                        $this->modx->user->addSessionContext($ctx);
                    }
                }
            } else {
                if (empty($this->config['json_response'])) {
                    $this->_sendRedirect('reload');
                }

                return $this->error($this->modx->lexicon('office_auth_err_phone_code_invalid'));
            }
        }
        if ($mode == 'phone') {
            return !empty($password)
                ? $this->success(
                    $this->modx->lexicon('office_auth_success'), array('refresh' => $this->_getLoginLink())
                )
                : $this->success($this->modx->lexicon('office_auth_password_success'), array('sms' => false));
        }
        $this->_sendRedirect('login');

        return true;
    }


    /**
     * Logout current user
     *
     * @param array $data
     */
    public function Logout(array $data)
    {
        if (!empty($data['user_id'])) {
            if (!empty($_SESSION['Office']['LoggedIn'])) {
                unset($_SESSION['Office']['LoggedIn'][$data['user_id']]);
            }
        }
        if ((empty($data['user_id']) || $data['user_id'] == $this->modx->user->id) && $this->modx->user->isAuthenticated($this->modx->context->key)) {
            $ha_path = MODX_CORE_PATH . 'components/hybridauth/model/hybridauth/';
            if (!empty($this->config['HybridAuth']) && file_exists($ha_path)) {
                /** @var HybridAuth $HybridAuth */
                if ($HybridAuth = $this->modx->getService('HybridAuth', 'HybridAuth', $ha_path)) {
                    /** @noinspection PhpUndefinedFieldInspection */
                    if (is_object($HybridAuth->Hybrid_Auth)) {
                        /** @noinspection PhpUndefinedFieldInspection */
                        $HybridAuth->Hybrid_Auth->logoutAllProviders();
                        unset($_SESSION['HA::STORE'], $_SESSION['HA::CONFIG']);
                    } elseif (!empty($HybridAuth->adapters)) {
                        try {
                            foreach ($HybridAuth->adapters as $adapter) {
                                $adapter->disconnect();
                            }
                        } catch (Exception $e) {
                            $HybridAuth->exceptionHandler($e);
                        }
                    }
                }
            }

            $logout_data = array();
            if (!empty($this->config['loginContext'])) {
                $logout_data['login_context'] = $this->config['loginContext'];
            }
            if (!empty($this->config['addContexts'])) {
                $logout_data['add_contexts'] = $this->config['addContexts'];
            }

            $response = $this->modx->runProcessor('security/logout', $logout_data);
            if ($response->isError()) {
                $errors = $this->_formatProcessorErrors($response);
                $this->modx->log(modX::LOG_LEVEL_ERROR,
                    '[Office] logout error. Username: ' .
                    $this->modx->user->get('username') . ', uid: ' . $this->modx->user->get('id') .
                    '. Message: ' . $errors
                );
            }
            // Trying to login as already authorized user
            if (!empty($_SESSION['Office']['LoggedIn'])) {
                unset($_SESSION['Office']['LoggedIn'][$this->modx->user->id]);
                foreach ($_SESSION['Office']['LoggedIn'] as $uid => $hash) {
                    if ($this->Change(array('user_id' => $uid), false)) {
                        break;
                    }
                }
            }
        }

        if (!isset($data['redirect'])) {
            $this->_sendRedirect('logout');
        }
    }


    /**
     * @param array $data
     * @param bool $redirect
     *
     * @return bool
     */
    public function Change(array $data, $redirect = true)
    {
        if (!empty($data['user_id']) && !empty($_SESSION['Office']['LoggedIn'])) {
            $uid = (int)$data['user_id'];
            if (isset($_SESSION['Office']['LoggedIn'][$uid])) {
                $hash = $_SESSION['Office']['LoggedIn'][$uid];
                /** @var modUser $user */
                $user = $this->modx->getObjectGraph('modUser', '{"Profile":{}}', array(
                    'modUser.id' => $uid,
                    'modUser.active' => true,
                    'Profile.blocked' => false,
                ));
                if ($user && $user->get('password') == $hash) {
                    $this->modx->user = $user;
                    $keys = array($this->config['loginContext']);
                    if (!empty($this->config['addContexts'])) {
                        $keys = array_merge($keys, array_map('trim', explode(',', $this->config['addContexts'])));
                    }
                    $contexts = $this->modx->getIterator('modContext', array('key:IN' => $keys));
                    /** @var modContext $context */
                    foreach ($contexts as $context) {
                        $this->modx->user->addSessionContext($context->key);
                        $this->modx->getUser($context->key, true);
                    }

                    if (!$redirect) {
                        return true;
                    }
                } else {
                    unset($_SESSION['Office']['LoggedIn'][$uid]);
                }
            }
        }

        if ($redirect) {
            $this->_sendRedirect();
        }

        return false;
    }


    /**
     * Generate new password and send activation link for existing user
     *
     * @param $username
     * @param $password
     * @param $tpl
     *
     * @return array|string
     */
    protected function _resetPassword($username, $password = '', $tpl = '')
    {
        /** @var modUser $user */
        $c = $this->modx->newQuery('modUser');
        $c->innerJoin('modUserProfile', 'Profile');
        $c->where(array('modUser.username' => $username, 'OR:Profile.email:=' => $username));
        $c->select($this->modx->getSelectColumns('modUser', 'modUser') . ',`Profile`.`email`,`Profile`.`mobilephone`');
        if (!$user = $this->modx->getObject('modUser', $c)) {
            return $this->error($this->modx->lexicon('office_auth_err_email_username_nf'));
        }
        /*
        elseif ($user->sudo) {
            return $this->error($this->modx->lexicon('office_auth_err_sudo_user'));
        }
        */
        $email = $user->get('email');
        $phone = $user->get('mobilephone');
        if ($this->modx->getOption('office_auth_mode') == 'phone' && $phone = $this->office->checkPhone($phone)) {
            $mode = 'phone';
            $activationHash = rand(100000, 999999);
        } else {
            $mode = 'email';
            $activationHash = md5(uniqid(md5($email . '/' . $user->get('id')), true));
        }

        /** @var modDbRegister $registry */
        $registry = $this->modx->getService('registry', 'registry.modRegistry')
            ->getRegister('user', 'registry.modDbRegister');
        $registry->connect();

        // Check if we already sent activation link
        $registry->subscribe('/pwd/reset/' . md5($user->username));
        $res = $registry->read(array('poll_limit' => 1, 'remove_read' => false));
        if (!empty($res)) {
            return $this->error(
                $this->modx->lexicon('office_auth_err_already_' . $mode . '_sent'),
                array('sms' => $mode == 'phone')
            );
        }

        $newPassword = !empty($password)
            ? $password
            : $user->generatePassword();
        $_SESSION['Office']['Auth']['cachepwd'] = $newPassword;
        if ($profile = $user->getOne('Profile')) {
            $extended = $profile->get('extended');
            $extended['office_activation_key'] = $activationHash;
            $profile->set('extended', $extended);
        }
        $user->set('cachepwd', $newPassword);
        $user->save();

        // Render activation template
        if (empty($tpl)) {
            $tpl = $this->config['tplActivate'];
        }
        $pls = array_merge($user->getOne('Profile')->toArray(), $user->toArray());
        if ($mode == 'phone') {
            $pls['code'] = $activationHash;
            $pls['link'] = '';
        } else {
            $id = !empty($this->config['loginResourceId'])
                ? $this->config['loginResourceId']
                : (!empty($_REQUEST['pageId'])
                    ? $_REQUEST['pageId']
                    : $this->modx->getOption('site_start')
                );
            $pls['code'] = '';
            $pls['link'] = $this->modx->makeUrl($id, '', array(
                'action' => 'auth/login',
                'email' => rawurlencode($email),
                'hash' => $activationHash,
            ), 'full');
        }
        $pls['password'] = empty($password)
            ? $newPassword
            : '';

        $content = $this->office->pdoTools->getChunk($tpl, $pls);
        $maxIterations = (int)$this->modx->getOption('parser_max_iterations', null, 10);
        $this->modx->getParser()->processElementTags('', $content, false, false, '[[', ']]', array(), $maxIterations);
        $this->modx->getParser()->processElementTags('', $content, true, true, '[[', ']]', array(), $maxIterations);

        if ($mode == 'phone') {
            /** @var SmsRu|ByteHand $provider */
            $provider = $this->modx->getService(
                $this->modx->getOption('office_sms_provider'),
                $this->modx->getOption('office_sms_provider'),
                $this->modx->getOption('office_sms_provider_path', null,
                    $this->office->config['corePath'] . 'model/sms/')
            );
            if (is_object($provider) && method_exists($provider, 'send')) {
                $send = $provider->send($phone, trim($content));
                if ($send !== true) {
                    $this->modx->log(modX::LOG_LEVEL_ERROR,
                        '[Office] Unable to send sms to ' . $phone . '. Response is: ' . $send
                    );

                    return $this->error($this->modx->lexicon('office_auth_err_sms', array('errors' => $send)));
                }
            } else {
                return $this->error($this->modx->lexicon('office_auth_err_sms_provider'));
            }
        } else {
            $send = $user->sendEmail(trim($content), array(
                'subject' => $this->modx->lexicon('office_auth_email_subject'),
            ));
            if ($send !== true) {
                $errors = $this->modx->mail->mailer->ErrorInfo;
                $this->modx->log(modX::LOG_LEVEL_ERROR,
                    '[Office] Unable to send email to ' . $email . '. Message: ' . $errors
                );

                return $this->error($this->modx->lexicon('office_auth_err_email_send', array('errors' => $errors)));
            }
        }

        $registry->subscribe('/pwd/reset/');
        $registry->send(
            '/pwd/reset/',
            array(md5($user->username) => $activationHash),
            array('ttl' => $this->config['linkTTL'])
        );

        // Generate of new token to prevent multiple user actions
        if ($mode != 'phone') {
            $this->office->getCsrfToken(true);
        }

        return $mode == 'phone'
            ? $this->success($this->modx->lexicon('office_auth_phone_send'), array(
                'sms' => true,
            ))
            : $this->success($this->modx->lexicon('office_auth_email_send'));
    }


    /**
     * @param string $scheme
     *
     * @return string
     */
    protected function _getLoginLink($scheme = 'full')
    {
        if (!empty($this->config['loginResourceId'])) {
            $id = $this->config['loginResourceId'];
        } elseif (!empty($_REQUEST['return'])) {
            return $_REQUEST['return'];
        } elseif (!empty($_SERVER['HTTP_REFERER'])) {
            return $_SERVER['HTTP_REFERER'];
        } else {
            $id = $this->modx->getOption('site_start');
        }

        return $this->modx->makeUrl($id, '', '', $scheme);
    }


    /**
     * Create new user and send activation email
     *
     * @param array $data
     *
     * @return array|string
     */
    protected function _createUser(array $data)
    {
        if (empty($data['email'])) {
            $data['email'] = $data['username'] . '@' . $this->modx->getOption('http_host');
        }
        if (empty($data['fullname'])) {
            $data['fullname'] = substr($data['email'], 0, strpos($data['email'], '@'));
        }
        if (empty($data['mobilephone'])) {
            $data['mobilephone'] = '';
        }

        $response = $this->office->runProcessor('auth/create', array(
            'username' => $data['username'],
            'fullname' => $data['fullname'],
            'mobilephone' => $data['mobilephone'],
            'email' => $data['email'],
            'active' => false,
            'blocked' => false,
            'groups' => $this->config['groups'],
        ));

        if ($response->isError()) {
            $errors = $this->_formatProcessorErrors($response);
            $this->modx->log(modX::LOG_LEVEL_ERROR,
                '[Office] Unable to create user "' . $data['username'] . '". Message: ' . $errors);

            return $this->error($this->modx->lexicon('office_auth_err_create', array('errors' => $errors)));
        }

        return $this->_resetPassword($data['username'], $data['password'], $this->config['tplRegister']);
    }


    /**
     * Reloads site page on various events.
     *
     * @param string $action The action to do
     *
     * @return void
     */
    protected function _sendRedirect($action = '')
    {
        $error_pages = array($this->modx->getOption('error_page'), $this->modx->getOption('unauthorized_page'));

        if ($action == 'login' && $this->config['loginResourceId']) {
            if (in_array($this->config['loginResourceId'], $error_pages)) {
                $this->config['loginResourceId'] = $this->config['page_id'];
            }
            $url = $this->modx->makeUrl($this->config['loginResourceId'], '', '', 'full');
        } elseif ($action == 'logout' && $this->config['logoutResourceId']) {
            if (in_array($this->config['logoutResourceId'], $error_pages)) {
                $this->config['logoutResourceId'] = $this->config['page_id'];
            }
            $url = $this->modx->makeUrl($this->config['logoutResourceId'], '', '', 'full');
        } else {
            $request = preg_replace('#^' . $this->modx->getOption('base_url') . '#', '', $_SERVER['REQUEST_URI']);
            $url = $this->modx->getOption('site_url') . ltrim($request, '/');

            $pos = strpos($url, '?');
            if ($pos !== false) {
                $arr = explode('&', substr($url, $pos + 1));
                $url = substr($url, 0, $pos);
                if (count($arr) > 1) {
                    foreach ($arr as $k => $v) {
                        if (preg_match('/(action|provider|email|hash|user_id)+/i', $v, $matches)) {
                            unset($arr[$k]);
                        }
                    }
                    if (!empty($arr)) {
                        $url = $url . '?' . implode('&', $arr);
                    }
                }
            }
        }

        $this->modx->sendRedirect($url);
    }


    /**
     * More convenient error messages
     *
     * @param modProcessorResponse $response
     * @param string $glue
     *
     * @return string
     */
    protected function _formatProcessorErrors(modProcessorResponse $response, $glue = 'br')
    {
        $errormsgs = array();

        if ($response->hasMessage()) {
            $errormsgs[] = $response->getMessage();
        }
        if ($response->hasFieldErrors()) {
            if ($errors = $response->getFieldErrors()) {
                foreach ($errors as $error) {
                    $errormsgs[] = $error->message;
                }
            }
        }

        return implode($glue, $errormsgs);
    }


    /**
     * @param array $data
     *
     * @return modUserProfile|null
     */
    protected function checkLogin(array $data)
    {
        /** @var modUserProfile $profile */
        $profile = null;
        // Check email and username
        $username = strtolower(trim(@$data['username']));
        $email = strtolower(trim(@$data['email']));
        $phone = $this->office->checkPhone(!empty($username) ? $username : @$data['mobilephone']);
        if (!empty($username)) {
            if ($user = $this->modx->getObject('modUser', array('username' => $username))) {
                $profile = $user->getOne('Profile');
            } else {
                $profile = $this->modx->getObject('modUserProfile', array('email' => $username));
            }
        }
        if (!$profile && !empty($email)) {
            $profile = $this->modx->getObject('modUserProfile', array('email' => $email));
        }
        if (!$profile && !empty($phone)) {
            $profile = $this->modx->getObject('modUserProfile', array('mobilephone' => $phone));
        }

        return $profile;
    }
}

return 'officeAuthController';
