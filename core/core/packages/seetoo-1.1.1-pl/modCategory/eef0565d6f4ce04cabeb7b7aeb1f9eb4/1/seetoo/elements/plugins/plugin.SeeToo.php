<?php
switch ($modx->event->name) {
    case "OnWebPageComplete" :
        $packageName = 'seetoo';
        $packagepath = $modx->getOption('seetoo_core_path', null, MODX_CORE_PATH . 'components/' . strtolower($packageName) . '/');
        $modelpath = $packagepath . 'model/';

        if (!$modx->addPackage($packageName, $modelpath)) {
            $modx->log(MODX::LOG_LEVEL_ERROR, 'There was a problem adding your package.');
            return;
        }
        $seetoo = $modx->getService('seetoo', 'seetoo');
        
        if (empty($_SERVER['HTTP_REFERER'])) {
            $modx->log(MODX::LOG_LEVEL_INFO, 'Referrer is not defined');
            return;
        }
        $url = parse_url($_SERVER['HTTP_REFERER']);
        if ($url['host'] !== $modx->getOption('http_host')) {
            $modx->log(MODX::LOG_LEVEL_INFO, 'Referrer not local');
            return;
        }
        $url = $url['path'];

        if ($url === '/') {
            if ($htmlType = $modx->getObject('modContentType', array('mime_type' => 'text/html'))) {
                $url = 'index' . $htmlType->get('file_extensions');
            }
        }

        if (strpos($url, '/') === 0) {
            $url = substr($url, 1);
        }
        if (!$url) {
            $modx->log(MODX::LOG_LEVEL_INFO, 'Url referrer not found');
            return;
        }
        if (empty($modx->context->aliasMap)) {
            if (!$referer = $modx->getObject('modResource', array('uri' => $url))) {
                $modx->log(MODX::LOG_LEVEL_INFO, 'Referrer resource not found');
                return;
            }
            $referer_id = $referer->get('id');
        } else {
            $referer_id = $modx->context->aliasMap[$url];
            if (!$referer_id) {
                $modx->log(MODX::LOG_LEVEL_INFO, 'Resource referrer not found');
                return;
            }
            if ($referer_id == $modx->resource->id) {
                $modx->log(MODX::LOG_LEVEL_INFO, 'Resource not new');
                return;
            }
            if (!$referer = $modx->getObject('modResource', $referer_id)) {
                $modx->log(MODX::LOG_LEVEL_INFO, 'Referrer resource not found');
                return;
            }
        }

        // exclude by content type
        $exclude_ct = $modx->getOption('seetoo_exclude_content_type');
        $exclude_ct = explode(',', $exclude_ct);
        $exclude_ct = array_map('trim', $exclude_ct);

        if (in_array($referer->get('contentType'), $exclude_ct) || in_array($modx->resource->get('contentType'), $exclude_ct)) {
            $modx->log(MODX::LOG_LEVEL_INFO, 'Resource excluded by content type');
            return;
        }
        // end exclude by content type

        // exclude by system pages
        $system_pages = array(
            $modx->getOption('error_page'),
            $modx->getOption('site_unavailable_page'),
            $modx->getOption('unauthorized_page'),
        );
        if (in_array($referer->id, $system_pages) || in_array($modx->resource->id, $system_pages)) {
            $modx->log(MODX::LOG_LEVEL_INFO, 'Link ' . $referer->id . ' --> ' . $modx->resource->id . ' excluded by system pages');
            return;
        }
        // end exclude by system pages

        // exclude by excluder
        if (!$seetoo->excluder->check($referer, $modx->resource)) {
            return;
        }
        // end exclude by excluder

        $class = 'SeeTooResource';
        $resource_from = $referer_id;
        $resource_to = $modx->resource->id;
        if ($st_resource = $modx->getObject($class, array('resource_from' => $resource_from, 'resource_to' => $resource_to))) {
            $view = $st_resource->get('view');
            $st_resource->set('view', $view + 1);
        } else {
            $st_resource = $modx->newObject($class, array('resource_from' => $resource_from, 'resource_to' => $resource_to, 'view' => 1));
        }
        $st_resource->save();
        break;
}