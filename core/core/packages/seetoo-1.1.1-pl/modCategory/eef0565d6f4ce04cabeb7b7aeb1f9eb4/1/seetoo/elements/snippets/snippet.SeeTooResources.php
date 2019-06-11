<?php
$fqn = $modx->getOption('pdoFetch.class', null, 'pdotools.pdofetch', true);
if ($pdoClass = $modx->loadClass($fqn, '', false, true)) {
	$pdoFetch = new $pdoClass($modx, $scriptProperties);
} elseif ($pdoClass = $modx->loadClass($fqn, MODX_CORE_PATH . 'components/pdotools/model/', false, true)) {
	$pdoFetch = new $pdoClass($modx, $scriptProperties);
} else {
	$modx->log(modX::LOG_LEVEL_ERROR, 'Could not load pdoFetch from "MODX_CORE_PATH/components/pdotools/model/".');
	return false;
}

if (empty($class)) {
	$class = $modx->getOption('class', $scriptProperties, 'modResource');
}
if (empty($useRandom)) {
	$useRandom = $modx->getOption('useRandom', $scriptProperties, 1);
}
if (empty($resource)) {
	$resource = $modx->resource->id;
}
if (empty($resources)) {
	$resources = '-' . $modx->resource->id;
}
$leftJoin = array(
	'See' => array(
		'class' => 'SeeTooResource',
		'on' => $class . '.id = See.resource_to AND See.key = "' . $filter . '" AND See.resource_from = ' . $resource . ' AND See.view >= ' . $scriptProperties['minCount']
	)
);
if (!$showUnactive) {
	$leftJoin['See']['on'] .= ' AND See.active = 1';
}

$select = array(
	$class => '*',
	'See' => 'IFNULL(See.view, 0) as view'
);
if (isset($scriptProperties['select'])) {
	$selectCustom = $modx->fromJson($scriptProperties['select']);
	$select = array_merge($select, $selectCustom);
}

$sortBy = array(
	"See.view" => "DESC",
	"RAND()" => ""
);
if (isset($scriptProperties['sortby'])) {
	$sortBy = $modx->fromJson($scriptProperties['sortby']);
}

$custom = array(
	'class' => $class,
	'resource' => $resource,
	'resources' => $resources,
	'loadModels' => 'seetoo',
	'sortby' => $modx->toJson($sortBy),
	'select' => $modx->toJson($select)
);

if ($useRandom) {
	if (isset($scriptProperties['leftJoin'])) {
		$leftJoinCustom = $modx->fromJson($scriptProperties['leftJoin']);
		$leftJoin = array_merge($leftJoin, $leftJoinCustom);
	}
	$custom['leftJoin'] = $modx->toJSON($leftJoin);
} else {
	if (isset($scriptProperties['innerJoin'])) {
		$leftJoinCustom = $modx->fromJson($scriptProperties['innerJoin']);
		$leftJoin = array_merge($leftJoin, $leftJoinCustom);
	}
	$custom['innerJoin'] = $modx->toJSON($leftJoin);;
}
$scriptProperties = array_merge($scriptProperties, $custom);

$data = $cache ? $pdoFetch->getCache($scriptProperties) : array();
if (empty($data)) {
	$data = $modx->runSnippet($scriptProperties['element'], $scriptProperties);
	if ($cache) {
		$pdoFetch->setCache($data, $scriptProperties);
	}
}

return $data;