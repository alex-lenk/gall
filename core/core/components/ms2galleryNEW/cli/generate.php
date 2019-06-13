<?php
define('MODX_API_MODE', true);
/** @noinspection PhpIncludeInspection */
require dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/index.php';

/** @var modX $modx */
$modx->getService('error', 'error.modError');
$modx->setLogLevel(modX::LOG_LEVEL_ERROR);
$modx->setLogTarget('ECHO');
/** @var ms2Gallery $ms2Gallery */
$ms2Gallery = $modx->getService('ms2gallery', 'ms2Gallery', MODX_CORE_PATH . 'components/ms2gallery/model/ms2gallery/');

$files = $modx->getIterator('msResourceFile', array('parent' => 0));
$num = 0;
$startTime = microtime(true);
/** @var msResourceFile $file */
foreach ($files as $file) {
    /** @var msResourceFile $child */
    $children = $file->getMany('Children');
    foreach ($children as $child) {
        $child->remove();
    }
    $file->generateThumbnails();
    $num++;
}
echo "Generated previews for $num files in " . number_format(microtime(true) - $startTime, 2) . " sec.\n";

if ($modx->getOption('ms2gallery_sync_ms2')) {
    $num = 0;
    $startTime = microtime(true);
    $c = $modx->newQuery('msProduct', array('class_key' => 'msProduct'));
    $c->select('id');
    if ($c->prepare() && $c->stmt->execute()) {
        while ($id = $c->stmt->fetchColumn()) {
            $num += $ms2Gallery->syncFiles('ms2', $id);
        }
        echo "Synchronized $num files with miniShop2 in " . number_format(microtime(true) - $startTime, 2) .
            " sec.\n";
    }
}
if ($modx->getOption('ms2gallery_sync_tickets')) {
    $num = 0;
    $startTime = microtime(true);
    $c = $modx->newQuery('Ticket', array('class_key' => 'Ticket'));
    $c->select('id');
    if ($c->prepare() && $c->stmt->execute()) {
        while ($id = $c->stmt->fetchColumn()) {
            $num += $ms2Gallery->syncFiles('tickets', $id);
        }
        echo "Synchronized $num files with Tickets in " . number_format(microtime(true) - $startTime, 2) .
            " sec.\n";
    }
}