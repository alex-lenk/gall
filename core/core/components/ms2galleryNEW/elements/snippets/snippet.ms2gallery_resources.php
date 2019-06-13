<?php
/** @var array $scriptProperties */
$class = $modx->getOption('class', $scriptProperties, 'modResource', true);
$snippet = $modx->getOption('snippet', $scriptProperties, 'pdoResources', true);

// Load model
if (empty($loadModels)) {
    $scriptProperties['loadModels'] = 'ms2gallery';
} else {
    $loadModels = array_map('trim', explode(',', $loadModels));
    if (!in_array('ms2gallery', $loadModels)) {
        $loadModels[] = 'ms2gallery';
    }
    $scriptProperties['loadModels'] = $loadModels;
}

// Type of join
if (empty($typeOfJoin)) {
    $typeOfJoin = 'left';
}
switch (strtolower(trim($typeOfJoin))) {
    case 'right':
        $join = 'rightJoin';
        break;
    case 'inner':
        $join = 'innerJoin';
        break;
    default:
        $join = 'leftJoin';
        break;
}

// Select modResource
$columns = array_keys($modx->getFieldMeta($class));
if (empty($includeContent) && empty($useWeblinkUrl)) {
    $key = array_search('content', $columns);
    unset($columns[$key]);
}
$select = array(
    $class => implode(',', $columns),
);

// Include Thumbnails
${$join} = array();
if (empty($includeThumbs)) {
    $includeThumbs = 'small';
}
$thumbs = array_map('trim', explode(',', $includeThumbs));
if (!empty($thumbs[0])) {
    foreach ($thumbs as $thumb) {
        ${$join}[] = array(
            'class' => 'msResourceFile',
            'alias' => $thumb,
            'on' => implode(' AND ', array(
                "`$thumb`.`resource_id` = `$class`.`id`",
                "`$thumb`.`parent` != 0",
                "`$thumb`.`path` LIKE '%/$thumb/%'",
                "`$thumb`.`active` = 1",
                "`$thumb`.`rank` = 0",
            )),
        );
        $select[$thumb] = implode(',', array(
            "`$thumb`.`url` as `$thumb`",
            "`$thumb`.`name` as `$thumb.name`",
            "`$thumb`.`description` as `$thumb.description`",
            "`$thumb`.`createdon` as `$thumb.createdon`",
            "`$thumb`.`createdby` as `$thumb.createdby`",
            "`$thumb`.`properties` as `$thumb.properties`",
            "`$thumb`.`alt` as `$thumb.alt`",
            "`$thumb`.`add` as `$thumb.add`",
        ));

        if (!empty($includeOriginal)) {
            ${$join}[] = array(
                'class' => 'msResourceFile',
                'alias' => $thumb . 'o',
                'on' => "`{$thumb}o`.`id` = `$thumb`.`parent`",
            );
            $select[$thumb] .= ", `{$thumb}o`.`url` as `$thumb.original`";
        }
    }
}

foreach (array('leftJoin', 'innerJoin', 'rightJoin', 'select') as $v) {
    if (!empty($scriptProperties[$v])) {
        $tmp = json_decode($scriptProperties[$v], true);
        if (is_array($tmp)) {
            $$v = array_merge($$v, $tmp);
        }
    }
    unset($scriptProperties[$v]);
}
$scriptProperties['select'] = json_encode($select);
//$scriptProperties['groupby'] = $class . '.id';
$scriptProperties[$join] = json_encode(${$join});

return $modx->runSnippet($snippet, $scriptProperties);