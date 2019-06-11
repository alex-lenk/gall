<?php
if (file_exists(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php')) {
    /** @noinspection PhpIncludeInspection */
    require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
}
else {
    require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.core.php';
}
/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CONNECTORS_PATH . 'index.php';
/** @var SeeToo $SeeToo */
$SeeToo = $modx->getService('seetoo', 'seetoo', $modx->getOption('seetoo_core_path', null, $modx->getOption('core_path') . 'components/seetoo/') . 'model/seetoo/');
$modx->lexicon->load('seetoo:default');

// handle request
$corePath = $modx->getOption('seetoo_core_path', null, $modx->getOption('core_path') . 'components/seetoo/');
$path = $modx->getOption('processorsPath', $SeeToo->config, $corePath . 'processors/');
$modx->request->handleRequest(array(
	'processors_path' => $path,
	'location' => '',
));
