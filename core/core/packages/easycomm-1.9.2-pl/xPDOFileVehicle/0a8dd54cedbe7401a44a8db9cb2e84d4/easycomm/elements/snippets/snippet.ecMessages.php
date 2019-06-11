<?php
/** @var array $scriptProperties */
/** @var easyComm $easyComm */
if (!$easyComm = $modx->getService('easyComm', 'easyComm', $modx->getOption('ec_core_path', null, $modx->getOption('core_path') . 'components/easycomm/') . 'model/easycomm/', $scriptProperties)) {
	return 'Could not load easyComm class!';
}

// Do your snippet code here. This demo grabs 5 items from our custom table.
$tpl = $modx->getOption('tpl', $scriptProperties, 'tpl.ecMessages.Row');
$thread = $modx->getOption('thread', $scriptProperties, 'resource-'.$modx->resource->get('id'));
$sortby = $modx->getOption('sortby', $scriptProperties, 'date');
$sortdir = $modx->getOption('sortdir', $scriptProperties, 'DESC');
$limit = $modx->getOption('limit', $scriptProperties, 10);
$outputSeparator = $modx->getOption('outputSeparator', $scriptProperties, "\n");
$toPlaceholder = $modx->getOption('toPlaceholder', $scriptProperties, false);

// Build query
$c = $modx->newQuery('ecMessage');
$c->sortby($sortby, $sortdir);
$c->limit($limit);
$messages = $modx->getIterator('ecMessage', $c);

// Iterate through items
$output = array();
/** @var ecMessage $message */
foreach ($messages as $message) {
    $output[] = $modx->getChunk($tpl, $message->toArray());
}

// Output
$output = implode($outputSeparator, $output);
if (!empty($toPlaceholder)) {
	// If using a placeholder, output nothing and set output to specified placeholder
	$modx->setPlaceholder($toPlaceholder, $output);

	return '';
}
// By default just return output
return $output;
