<?php
/** @var array $scriptProperties */
/** @var ms2Gallery $ms2Gallery */
$ms2Gallery = $modx->getService('ms2gallery', 'ms2Gallery', MODX_CORE_PATH . 'components/ms2gallery/model/ms2gallery/');
/** @var pdoFetch $pdoFetch */
if (!$modx->loadClass('pdofetch', MODX_CORE_PATH . 'components/pdotools/model/pdotools/', false, true)) {
    return false;
}
$pdoFetch = new pdoFetch($modx, $scriptProperties);
$extDir = $modx->getOption('extensionsDir', $scriptProperties, 'components/ms2gallery/img/mgr/extensions/', true);
$fenom = !empty($scriptProperties['tpl']);

// Register styles and scripts on frontend
$config = $pdoFetch->makePlaceholders($ms2Gallery->config);
$css = $modx->getOption('frontend_css', $scriptProperties, 'frontend_css');
if (!empty($css) && preg_match('#\.css#i', $css)) {
    $modx->regClientCSS(str_replace($config['pl'], $config['vl'], $css));
}
$js = $modx->getOption('frontend_js', $scriptProperties, 'frontend_js');
if (!empty($js) && preg_match('#\.js#i', $js)) {
    $tmp = json_encode(array(
        'cssUrl' => $ms2Gallery->config['cssUrl'] . 'web/',
        'jsUrl' => $ms2Gallery->config['jsUrl'] . 'web/',
    ));
    $modx->regClientScript('<script type="text/javascript">ms2GalleryConfig=' . $tmp . ';</script>');
    $modx->regClientScript(str_replace($config['pl'], $config['vl'], $js));
}
if (empty($outputSeparator)) {
    $outputSeparator = "\n";
}
if (empty($tagsSeparator)) {
    $tagsSeparator = ',';
}

$where = array(
    'File.parent' => 0,
);

// Define where parameters
if ($scriptProperties['parents'] == '' && empty($scriptProperties['resources'])) {
    $resources = !empty($resource)
        ? $resource
        : $modx->resource->get('id');
    $scriptProperties['resources'] = $resources;
}

if (!empty($filetype)) {
    $where['File.type:IN'] = array_map('trim', explode(',', $filetype));
}

if (empty($showInactive)) {
    $where['File.active'] = 1;
}

$innerJoin = array(
    'File' => array(
        'class' => 'msResourceFile',
        'on' => 'File.resource_id = modResource.id',
    ),
);
if (!empty($tagsVar) && isset($_REQUEST[$tagsVar])) {
    $tags = $modx->stripTags($_REQUEST[$tagsVar]);
}
if (!empty($tags)) {
    $tags = array_map('trim', explode(',', str_replace('"', '', $tags)));
    $tags = implode('","', $tags);
    $innerJoin['Tag'] = array(
        'class' => 'msResourceFileTag',
        'on' => 'Tag.file_id = File.id AND Tag.tag IN ("' . $tags . '")',
    );
}

$select = array(
    'File' => '*',
);

// Set default sort by File table
if (!empty($sortby)) {
    $sortby = array_map('trim', explode(',', $sortby));
    foreach ($sortby as &$value) {
        if (strpos($value, '.') === false && strpos($value, '(') === false) {
            $value = 'File.' . $value;
        }
    }
    $scriptProperties['sortby'] = implode(', ', $sortby);
}

// Process additional query params
foreach (array('where', 'innerJoin', 'select') as $v) {
    if (!empty($scriptProperties[$v])) {
        $tmp = json_decode($scriptProperties[$v], true);
        if (is_array($tmp)) {
            $$v = array_merge($$v, $tmp);
        }
    }
    unset($scriptProperties[$v]);
}

if (empty($limit) && !empty($offset)) {
    $scriptProperties['limit'] = 10000;
}

// Default parameters
$default = array(
    'class' => 'modResource',
    'innerJoin' => $innerJoin,
    'where' => json_encode($where),
    'select' => $select,
    'limit' => 10,
    'sortby' => 'rank',
    'sortdir' => 'ASC',
    'fastMode' => false,
    'groupby' => 'File.id',
    'return' => 'data',
    'nestedChunkPrefix' => 'ms2gallery_',
);

// Merge all properties and run!
if (empty($scriptProperties['tpl']) && !empty($tplRow)) {
    $scriptProperties['tpl'] = $tplRow;
}
$pdoFetch->setConfig(array_merge($default, $scriptProperties));
$rows = $pdoFetch->run();

if (!empty($rows)) {
    $tmp = current($rows);
    $resolution = array();
    /** @var modMediaSource $mediaSource */
    if ($mediaSource = $modx->getObject('sources.modMediaSource', $tmp['source'])) {
        $properties = $mediaSource->getProperties();
        if (isset($properties['thumbnails']['value'])) {
            $fileTypes = json_decode($properties['thumbnails']['value'], true);
            foreach ($fileTypes as $k => $v) {
                if (!is_numeric($k)) {
                    $resolution[] = $k;
                } elseif (!empty($v['name'])) {
                    $resolution[] = $v['name'];
                } else {
                    $resolution[] = @$v['w'] . 'x' . @$v['h'];
                }
            }
        }
    }
}

// Processing rows
$output = null;
$images = array();
foreach ($rows as $k => $row) {
    $row['idx'] = $pdoFetch->idx++;
    $row['tags'] = '';

    if (!empty($row['type'])) {
        if ($row['type'] == 'image') {
            $previews = $pdoFetch->getCollection('msResourceFile', array('parent' => $row['id']));
            foreach ($previews as $preview) {
                if (preg_match("#/{$preview['resource_id']}/(.*?)/#", $preview['url'], $size)) {
                    $row[$size[1]] = !empty($getPreviewProperties)
                        ? $preview
                        : $preview['url'];
                }
            }
        } else {
            $row['thumbnail'] = file_exists(MODX_ASSETS_PATH . $extDir . $row['type'] . '.png')
                ? MODX_ASSETS_URL . $extDir . $row['type'] . '.png'
                : MODX_ASSETS_URL . $extDir . 'other.png';
            if (!empty($resolution)) {
                foreach ($resolution as $v) {
                    $row[$v] = $row['thumbnail'];
                }
            }
        }
    }


    if (!empty($getTags)) {
        $q = $modx->newQuery('msResourceFileTag', array('file_id' => $row['id']));
        $q->select('tag');
        $tstart = microtime(true);
        if ($q->prepare() && $q->stmt->execute()) {
            $modx->queryTime += microtime(true) - $tstart;
            $modx->executedQueries++;
            $row['tags'] = implode($tagsSeparator, $q->stmt->fetchAll(PDO::FETCH_COLUMN));
        }
    }

    $images[] = $row;
}
$pdoFetch->addTime(!empty($getTags) ? 'Thumbnails and tags was retrieved' : 'Thumbnails was retrieved');

// Processing chunks
$output = array();
if ($fenom) {
    $output[] = $pdoFetch->getChunk($tpl, array(
        'files' => $images,
        'images' => $images,
    ));
} else {
    foreach ($images as $row) {
        $tpl = $pdoFetch->defineChunk($row);

        $output[] = empty($tpl)
            ? '<pre>' . $pdoFetch->getChunk('', $row) . '</pre>'
            : $pdoFetch->getChunk($tpl, $row, $pdoFetch->config['fastMode']);
    }
}
$pdoFetch->addTime('Rows was templated');

// Return output
$log = '';
if ($modx->user->hasSessionContext('mgr') && !empty($showLog)) {
    $log .= '<pre class="ms2GalleryLog">' . print_r($pdoFetch->getTime(), 1) . '</pre>';
}

if (!$fenom) {
    if (!empty($toSeparatePlaceholders)) {
        $output['log'] = $log;
        $modx->setPlaceholders($output, $toSeparatePlaceholders);

        return;
    }
    if (count($output) === 1 && !empty($tplSingle)) {
        $output = $pdoFetch->getChunk($tplSingle, array_shift($images));
    } else {
        $output = implode($outputSeparator, $output);

        if (!empty($output)) {
            $arr = array_shift($images);
            $arr['rows'] = $output;
            $arr['images'] = $images;
            if (!empty($tplOuter)) {
                $output = $pdoFetch->getChunk($tplOuter, $arr);
            }
        } else {
            $output = !empty($tplEmpty)
                ? $pdoFetch->getChunk($tplEmpty)
                : '';
        }
    }
}

if (is_array($output)) {
    $output = implode($outputSeparator, $output);
}
$output .= $log;
if (!empty($toPlaceholder)) {
    $modx->setPlaceholder($toPlaceholder, $output);
} else {
    return $output;
}