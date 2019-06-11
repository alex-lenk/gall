<?php

if (empty($_REQUEST['action'])) {
    @session_write_close();
    die('Access denied');
}

define('MODX_API_MODE', true);
/** @noinspection PhpIncludeInspection */
require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/index.php';
/** @var modX $modx */
$modx->getService('error', 'error.modError');
$modx->getRequest();
$modx->setLogLevel(modX::LOG_LEVEL_ERROR);
$modx->setLogTarget('FILE');
$modx->error->reset();

if (!empty($_REQUEST['pageId']) && $resource = $modx->getObject('modResource', (int)$_REQUEST['pageId'])) {
    $ctx = $resource->get('context_key');
} else {
    $ctx = !empty($_REQUEST['ctx'])
        ? $_REQUEST['ctx']
        : 'web';
}
if ($ctx != 'web' && $modx->getCount('modContext', array('key' => $ctx))) {
    $modx->switchContext($ctx);
    $modx->user = null;
    $modx->getUser($ctx);
}

/** @var Office $Office */
define('MODX_ACTION_MODE', true);
$Office = $modx->getService('office', 'Office', MODX_CORE_PATH . 'components/office/model/office/');
if ($modx->error->hasError() || !($Office instanceof Office)) {
    @session_write_close();
    die('Error');
}
$Office->initialize($ctx);

$action = $_REQUEST['action'];
unset($_REQUEST['action']);
if (!$response = $Office->loadAction($action, $_REQUEST)) {
    $response = json_encode(array(
        'success' => false,
        'message' => $modx->lexicon('office_err_action_nf'),
    ));
}

@session_write_close();
echo $response;