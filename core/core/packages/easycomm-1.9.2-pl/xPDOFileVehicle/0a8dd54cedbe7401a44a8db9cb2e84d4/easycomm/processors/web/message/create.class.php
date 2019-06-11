<?php

/**
 * Create an ecMessage
 */
class easyCommMessageWebCreateProcessor extends modObjectCreateProcessor {
	public $objectType = 'ecMessage';
	public $classKey = 'ecMessage';
	public $languageTopics = array('easycomm');
	//public $permission = 'create';

    public $beforeSaveEvent = 'OnBeforeEcMessageSave';
    public $afterSaveEvent = 'OnEcMessageSave';

    /** @var ecMessage $object */
    public $object;

    /** @var ecThread $thread  */
    private $thread;

	/**
	 * @return bool
	 */
	public function beforeSet() {
        $threadId = $this->getProperty('thread');
        /** @var easyComm $easyComm */
        $easyComm = $this->modx->getService('easyComm');

		if (!$this->thread = $this->modx->getObject('ecThread', $threadId)) {
			$this->modx->error->addField('thread', $this->modx->lexicon('ec_message_err_thread'));
		}
        $requiredFields = $this->getProperty('requiredFields', null);
        if($requiredFields) {
            foreach($requiredFields as $rf) {
                $p = $this->getProperty($rf);
                if(empty($p)) {
                    $this->modx->error->addField($rf, $this->modx->lexicon('ec_message_err_'.$rf));
                }
            }
        }

        $emailField = 'user_email';
        $emailFieldValue = $this->getProperty('user_email');
        if($this->getProperty('validateEmail') && !empty($emailFieldValue)) {
            if(!$easyComm->isValidEmail($emailFieldValue)) {
                $this->modx->error->addField($emailField, $this->modx->lexicon('ec_message_err_validate_'.$emailField));
            }
        }

        // Если нет иных ошибок - проверяем на спам
        // в противном случае возникают проблемы при вторичной проверке формы
        if(!$this->modx->error->hasError()) {
            /** @var easyComm $easyComm */
            if(!$easyComm->verifyCaptcha()){
                $this->modx->error->addField('captcha', $this->modx->lexicon('ec_message_err_captcha'));
            }
        }

        // список полей, которые являются рейтингом. Поле rating - всегда присутствует
        $ratingMax = intval($this->modx->getOption('ec_rating_max'));
        $ratingFields = $easyComm->getEcMessageRatingFields();
        foreach ($ratingFields as $field) {
            $value = intval($this->getProperty($field));
            if($value < 0) {
                $value = 0;
            }
            if($value > $ratingMax) {
                $value = $ratingMax;
            }
            $this->setProperty($field, $value);
        }

        $now = date('Y-m-d H:i:s');
        $ip = $this->modx->request->getClientIp();
        $this->setProperties(array(
            'date' => $now,
            'ip' => $ip['ip'],
            'createdon' => $now,
            'createdby' => $this->modx->user->isAuthenticated($this->modx->context->key) ? $this->modx->user->id : 0,
            'editedon' => null,
            'editedby' => 0
        ));
        if($this->getProperty('published')) {
            $this->setProperties(array(
                'publishedon' => $now,
                'publishedby' => $this->modx->user->isAuthenticated($this->modx->context->key) ? $this->modx->user->id : 0,
            ));
        }
		return parent::beforeSet();
	}

    /** {@inheritDoc} */
    public function afterSave() {
        $this->thread->updateMessagesInfo();
        return parent::afterSave();
    }

}

return 'easyCommMessageWebCreateProcessor';