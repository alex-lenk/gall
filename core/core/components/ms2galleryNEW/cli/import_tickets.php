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

$num = 0;
if (!$table = $modx->getTableName('Ticket')) {
    $modx->log(modX::LOG_LEVEL_ERROR, 'Could not get table name of Ticket');
    exit;
}

// Change media source
$c = $modx->newQuery('Ticket', array('class_key' => 'Ticket'));
$c->innerJoin('TicketFile', 'File', 'File.class = "Ticket" AND File.parent=Ticket.id');
$c->select('Ticket.id, Ticket.properties, File.source');
$c->groupby('Ticket.id');
if ($c->prepare() && $c->stmt->execute()) {
    while($row = $c->stmt->fetch(PDO::FETCH_ASSOC)) {
        $properties = json_decode($row['properties'], true);
        if (empty($row['properties']['ms2gallery'])) {
            $properties['ms2gallery'] = array(
                'media_source' => $row['source']
            );
            $properties = json_encode($properties);
        } elseif (@$properties['ms2gallery']['media_source'] != $row['source']) {
            $properties['ms2gallery']['media_source'] = $row['source'];
            $properties = json_encode($properties);
        }

        if (!is_array($properties)) {
            $modx->exec("UPDATE {$table} SET properties = '{$properties}' WHERE id = {$row['id']}");
        }

        $num += $ms2Gallery->syncFiles('tickets', $row['id'], true);
    }
}

echo "Processed $num files in " . number_format(microtime(true) - $modx->startTime, 2) . " sec.\n";