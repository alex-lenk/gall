<?php
if (empty($_lang)) {
    $_lang = array();
}

include_once 'setting.inc.php';

$_lang['office'] = 'Личный кабинет';

$_lang['office_message_close_all'] = 'закрыть все';

$_lang['office_err_action_nf'] = 'Не могу найти указанное действие';
$_lang['office_err_auth'] = 'Требуется авторизация';

$_lang['office_err_mgr_auth'] = 'Вы авторизованы в админке, но не в текущем контексте. Пожалуйста, выйдите из админки или авторизуйтесь в текущем контексте.';
$_lang['office_auth_as_user'] = 'Авторизоваться';

$_lang['office_err_csrf'] = 'Ошибка проверки CSRF токена, возможно он уже устарел. Попробуйте перезагрузить страницу.';