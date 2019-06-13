<?php
/** @var modX $modx */
/** @var array $scriptProperties */
switch ($modx->event->name) {

    case 'OnDocFormRender':
        /** @var modResource $resource */
        $templates = array_map('trim', explode(',', $modx->getOption('ms2gallery_disable_for_templates')));
        $disable = $mode == 'new' ||
            ($templates[0] != '' && in_array($resource->get('template'), $templates)) ||
            ($resource->class_key == 'msProduct' &&
                $modx->getOption('ms2gallery_disable_for_ms2', null, true) &&
                !$modx->getOption('ms2gallery_sync_ms2', null, false)
            );
        if (!$disable) {
            /** @var ms2Gallery $ms2Gallery */
            $ms2Gallery = $modx->getService('ms2gallery', 'ms2Gallery',
                MODX_CORE_PATH . 'components/ms2gallery/model/ms2gallery/');
            if ($ms2Gallery) {
                $ms2Gallery->loadManagerFiles($modx->controller, $resource);
            }
        }
        break;

    case 'OnBeforeDocFormSave':
        if ($source_id = $resource->get('media_source')) {
            $resource->setProperties(array('media_source' => $source_id), 'ms2gallery');
        }
        break;

    case 'OnLoadWebDocument':
        if (!$modx->getOption('ms2gallery_set_placeholders', null, false, true)) {
            return;
        }
        $tstart = microtime(true);
        /** @var pdoFetch $pdoFetch */
        $pdoFetch = $modx->getService('pdoFetch');
        $plTemplates = array_map('trim', explode(',', $modx->getOption('ms2gallery_placeholders_for_templates')));
        if (!empty($plTemplates[0]) && !in_array($modx->resource->get('template'), $plTemplates)) {
            return;
        }
        $plPrefix = $modx->getOption('ms2gallery_placeholders_prefix', null, 'ms2g.', true);
        $plThumbs = array_map('trim', explode(',', $modx->getOption('ms2gallery_placeholders_thumbs')));
        $tplName = $modx->getOption('ms2gallery_placeholders_tpl');

        // Check for assigned TV
        $q = $modx->newQuery('modTemplateVarTemplate');
        $q->innerJoin('modTemplateVar', 'TemplateVar');
        $q->innerJoin('modTemplate', 'Template');
        $q->where(array(
            'TemplateVar.name' => $tplName,
            'Template.id' => $modx->resource->get('template'),
        ));
        $q->select('TemplateVar.id');
        $tpl = $modx->getCount('modTemplateVarTemplate', $q)
            ? '@INLINE ' . $modx->resource->getTVValue($tplName)
            : $tplName;

        $options = array('loadModels' => 'ms2gallery');
        $where = array('resource_id' => $modx->resource->id, 'parent' => 0);

        $parents = $pdoFetch->getCollection('msResourceFile', $where, $options);
        $options['select'] = 'url';
        foreach ($parents as &$parent) {
            $where = array('parent' => $parent['id']);
            if (!empty($plThumbs[0])) {
                $where['path:IN'] = array();
                foreach ($plThumbs as $thumb) {
                    $where['path:IN'][] = $parent['path'] . $thumb . '/';
                }
            }
            if ($children = $pdoFetch->getCollection('msResourceFile', $where, $options)) {
                foreach ($children as $child) {
                    if (preg_match("#/{$parent['resource_id']}/(.*?)/#", $child['url'], $size)) {
                        $parent[$size[1]] = $child['url'];
                    }
                }
            }
            $pls = $pdoFetch->makePlaceholders($parent, $plPrefix . $parent['rank'] . '.', '[[+', ']]', false);
            $pls['vl'][$plPrefix . $parent['rank']] = $pdoFetch->getChunk($tpl, $parent);
            $modx->setPlaceholders($pls['vl']);
        }

        $modx->log(modX::LOG_LEVEL_INFO, '[ms2Gallery] Set image placeholders for page id = ' . $modx->resource->id .
            ' in ' . number_format(microtime(true) - $tstart, 7) . ' sec.');
        break;

    case 'OnBeforeEmptyTrash':
        if (empty($scriptProperties['ids']) || !is_array($scriptProperties['ids'])) {
            return;
        }
        if (!$modx->addPackage('ms2gallery', MODX_CORE_PATH . 'components/ms2gallery/model/')) {
            return;
        }
        $resources = $modx->getIterator('modResource', array('id:IN' => $scriptProperties['ids']));
        /** @var modResource $resource */
        foreach ($resources as $resource) {
            $properties = $resource->getProperties('ms2gallery');
            if (!empty($properties['media_source'])) {
                /** @var modMediaSource $source */
                $source = $modx->getObject('modMediaSource', $properties['media_source']);
                $resource_id = $resource->get('id');
                if ($source) {
                    $source->set('ctx', $resource->get('context_key'));
                    $source->initialize();
                }
                $images = $modx->getIterator('msResourceFile', array('resource_id' => $resource_id, 'parent' => 0));
                /** @var msResourceFile $image */
                foreach ($images as $image) {
                    $prepare = $image->prepareSource($source);
                    if ($prepare === true) {
                        $image->remove();
                    } else {
                        $modx->log(modX::LOG_LEVEL_ERROR, "[ms2Gallery] {$prepare}.");
                    }
                }
                if ($source) {
                    $source->removeContainer($source->getBasePath() . $resource_id);
                }
            }
        }
        break;

}