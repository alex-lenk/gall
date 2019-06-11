<?php
if (empty($_lang)) {
    $_lang = array();
}

include_once 'setting.inc.php';

$_lang['office'] = 'Office';

$_lang['office_message_close_all'] = 'close all';

$_lang['office_err_action_nf'] = 'Could not find specified action';
$_lang['office_err_auth'] = 'Authorization required';

$_lang['office_err_mgr_auth'] = 'You are logged into the manager, but not in the current context. Please log out of the manager or login in the current context.';
$_lang['office_auth_as_user'] = 'Authorize';

$_lang['office_err_csrf'] = 'Error checking CSRF token, it may be outdated. Try to reload the page.';