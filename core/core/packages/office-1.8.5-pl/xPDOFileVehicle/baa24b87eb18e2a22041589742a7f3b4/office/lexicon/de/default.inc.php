<?php
if (empty($_lang)) {
    $_lang = array();
}

include_once 'setting.inc.php';

$_lang['office'] = 'Office';

$_lang['office_message_close_all'] = 'Alle schliessen';

$_lang['office_err_action_nf'] = 'Konte gew&aauml;hlt Aktion nicht finden.';
$_lang['office_err_auth'] = 'Autorisierung ben&ouml;tigt';

$_lang['office_err_mgr_auth'] = 'Sie sind im Manager angemeldet, aber nicht im aktuellen Kontext. Bitte aus dem Manager abmelden und im aktuellen Kontext anmelden.';
$_lang['office_auth_as_user'] = 'Autorisieren';

$_lang['office_err_csrf'] = 'Fehler beim Überprüfen des CSRF-Tokens, möglicherweise veraltet. Versuchen Sie, die Seite neu zu laden.';