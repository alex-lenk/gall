<?php

class ms2Gallery
{
    /** @var modX $modx */
    public $modx;
    /** @var modMediaSource $mediaSource */
    public $mediaSource;
    const version = '2.0.5';


    /**
     * @param modX $modx
     * @param array $config
     */
    function __construct(modX &$modx, array $config = array())
    {
        $this->modx =& $modx;

        $corePath = $this->modx->getOption('ms2gallery.core_path', $config,
            $this->modx->getOption('core_path') . 'components/ms2gallery/'
        );
        $assetsUrl = $this->modx->getOption('ms2gallery.assets_url', $config,
            $this->modx->getOption('assets_url') . 'components/ms2gallery/'
        );
        $actionUrl = $this->modx->getOption('ms2gallery.action_url', $config, $assetsUrl . 'action.php');
        $connectorUrl = $assetsUrl . 'connector.php';
        $pageSize = $this->modx->getOption('ms2gallery_page_size', null, 20);

        $this->config = array_merge(array(
            'assetsUrl' => $assetsUrl,
            'cssUrl' => $assetsUrl . 'css/',
            'jsUrl' => $assetsUrl . 'js/',
            'imagesUrl' => $assetsUrl . 'images/',

            'connector_url' => $connectorUrl,
            'actionUrl' => $actionUrl,

            'corePath' => $corePath,
            'modelPath' => $corePath . 'model/',
            'ctx' => 'web',
            'json_response' => false,

            'templatesPath' => $corePath . 'elements/templates/',
            'pageSize' => $pageSize,
        ), $config);

        $this->modx->addPackage('ms2gallery', $this->config['modelPath']);
        $this->modx->lexicon->load('ms2gallery:default');
        $this->checkStat();
    }


    /**
     * @param string $ctx
     * @param $source
     *
     * @return bool|null|object
     */
    public function initializeMediaSource($ctx = '', $source)
    {
        if ($this->mediaSource = $this->modx->getObject('sources.modMediaSource', $source)) {
            $this->mediaSource->set('ctx', $ctx);
            $this->mediaSource->initialize();

            return $this->mediaSource;
        } else {
            return false;
        }
    }


    /**
     * Accurate sorting of resource files
     *
     * @param $resource_id
     * @param bool $force
     */
    public function rankResourceImages($resource_id, $force = false)
    {
        if (!$force) {
            // Check if need to update files ranks
            $c = $this->modx->newQuery('msResourceFile', array(
                'resource_id' => $resource_id,
                'parent' => 0,
            ));
            $c->groupby('rank');
            $c->select('COUNT(rank) as idx');
            $c->sortby('idx', 'DESC');
            $c->limit(1);
            if ($c->prepare() && $c->stmt->execute()) {
                if ($c->stmt->fetchColumn() == 1) {
                    return;
                }
            }
        }
        // Update ranks
        $c = $this->modx->newQuery('msResourceFile', array(
            'resource_id' => $resource_id,
            'parent' => 0,
        ));
        $c->select('id');
        $c->sortby('rank ASC, createdon', 'ASC');
        if ($c->prepare() && $c->stmt->execute()) {
            $table = $this->modx->getTableName('msResourceFile');
            $update = $this->modx->prepare("UPDATE {$table} SET rank = ? WHERE (id = ? OR parent = ?)");
            $ids = $c->stmt->fetchAll(PDO::FETCH_COLUMN);
            foreach ($ids as $k => $id) {
                $update->execute(array($k, $id, $id));
            }
            $this->modx->prepare("ALTER TABLE {$table} ORDER BY rank ASC")
                ->execute();
        }
    }


    /**
     * Method for the synchronization of files with other packages.
     *
     * @param string $package Codename to sync
     * @param int $resource_id
     * @param bool $reverse Order of sync
     *
     * @return int
     */
    public function syncFiles($package, $resource_id, $reverse = false)
    {
        $num = 0;
        switch ($package) {
            case 'ms2':
            case 'minishop':
            case 'minishop2':
                $from = $reverse
                    ? 'msProductFile'
                    : 'msResourceFile';
                $to = $reverse
                    ? 'msResourceFile'
                    : 'msProductFile';
                // Clear old files
                $c = $this->modx->newQuery($to);
                $c->command('DELETE');
                $c->where($reverse
                    ? array('resource_id' => $resource_id)
                    : array('product_id' => $resource_id)
                );
                if ($c->prepare()) {
                    $c->stmt->execute();
                }
                // Add new
                $select = $this->modx->getSelectColumns($from);
                $c = $this->modx->newQuery($from, array('parent' => 0));
                $c->where($reverse
                    ? array('product_id' => $resource_id)
                    : array('resource_id' => $resource_id)
                );
                $c->select($select);
                if ($c->prepare() && $c->stmt->execute()) {
                    while ($row = $c->stmt->fetch(PDO::FETCH_ASSOC)) {
                        $file = $this->modx->newObject($to, $row);
                        if ($reverse) {
                            $file->set('resource_id', $row['product_id']);
                            $file->set('from', 'miniShop2');
                        } else {
                            $file->set('product_id', $row['resource_id']);
                        }
                        // Add thumbnails
                        $children = array();
                        $c2 = $this->modx->newQuery($from, array('parent' => $row['id']));
                        $c2->select($select);
                        if ($c2->prepare() && $c2->stmt->execute()) {
                            while ($row2 = $c2->stmt->fetch(PDO::FETCH_ASSOC)) {
                                $child = $this->modx->newObject($to, $row2);
                                if ($reverse) {
                                    $child->set('resource_id', $row2['product_id']);
                                    $child->set('from', 'miniShop2');
                                } else {
                                    $child->set('product_id', $row2['resource_id']);
                                }
                                $children[] = $child;
                            }
                        }
                        $file->addMany($children, 'Children');
                        $file->save();
                        $num++;
                    }
                }
                break;
            case 'ticket':
            case 'tickets':
                $from = $reverse
                    ? 'TicketFile'
                    : 'msResourceFile';
                $to = $reverse
                    ? 'msResourceFile'
                    : 'TicketFile';
                // Clear old files
                $c = $this->modx->newQuery($to);
                $c->command('DELETE');
                $c->where($reverse
                    ? array('resource_id' => $resource_id)
                    : array('parent' => $resource_id, 'class' => 'Ticket')
                );
                if ($c->prepare()) {
                    $c->stmt->execute();
                }
                // Add new
                $c = $this->modx->newQuery($from);
                $c->where($reverse
                    ? array('parent' => $resource_id, 'class' => 'Ticket', 'deleted' => 0)
                    : array('resource_id' => $resource_id, 'parent' => 0, 'active' => 1)
                );
                $c->select($this->modx->getSelectColumns($from));
                if ($c->prepare() && $c->stmt->execute()) {
                    while ($row = $c->stmt->fetch(PDO::FETCH_ASSOC)) {
                        /** @var msResourceFile|TicketFile $file */
                        $file = $this->modx->newObject($to, $row);
                        if ($reverse) {
                            $file->fromArray(array(
                                'parent' => 0,
                                'resource_id' => $row['parent'],
                                'from' => 'Ticket',
                            ));
                            $thumbs = json_decode($row['thumbs'], true);
                            if (empty($thumbs)) {
                                $thumbs = array('thumb' => $row['thumb']);
                            }
                            $children = array();
                            foreach ($thumbs as $key => $thumb) {
                                $child = $this->modx->newObject($to, $file->toArray('', true, true));
                                $child->fromArray(array(
                                    'url' => $thumb,
                                    'path' => $row['path'] . $key . '/',
                                    'properties' => array(),
                                ));
                                $children[] = $child;
                            }
                            $file->addMany($children, 'Children');
                        } else {
                            $properties = json_decode($row['properties'], true);
                            $file->fromArray(array(
                                'parent' => $row['resource_id'],
                                'class' => 'Ticket',
                                'size' => @$properties['size'],
                            ));
                            // Get ms2Gallery thumbnails
                            $c2 = $this->modx->newQuery($from, array('parent' => $row['id']));
                            $c2->sortby('rank', 'ASC');
                            $c2->select('path,url');
                            if ($c2->prepare() && $c2->stmt->execute()) {
                                $thumbs = array();
                                while ($thumb = $c2->stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $alias = end(explode('/', trim($thumb['path'], '/')));
                                    $thumbs[$alias] = $thumb['url'];
                                    if ($alias == 'thumb') {
                                        $file->set('thumb', $thumb['url']);
                                    }
                                }
                                $file->set('thumbs', $thumbs);
                            }
                        }
                        $file->save();
                        $num++;
                    }
                }
                break;
        }

        return $num;
    }


    /**
     * @param $source
     *
     * @return array
     */
    public function getSourceProperties($source = 0)
    {
        if (empty($source)) {
            $source = $this->modx->getOption('ms2gallery_source_default', null, 1, true);
        }
        $properties = array();
        /** @var $source modMediaSource */
        if ($source = $this->initializeMediaSource('web', $source)) {
            $tmp = $source->getProperties();
            foreach ($tmp as $v) {
                $properties[$v['name']] = $v['value'];
            }
        }

        return $properties;
    }


    /**
     * @param $path
     * @param string $part
     *
     * @return array
     */
    public function pathinfo($path, $part = '')
    {
        // Russian files
        if (preg_match('#[а-яё]#im', $path)) {
            $path = strtr($path, array('\\' => '/'));

            preg_match("#[^/]+$#", $path, $file);
            preg_match("#([^/]+)[.$]+(.*)#", $path, $file_ext);
            preg_match("#(.*)[/$]+#", $path, $dirname);

            $info = array(
                'dirname' => $dirname[1] ?: '.',
                'basename' => $file[0],
                'extension' => (isset($file_ext[2]))
                    ? $file_ext[2]
                    : '',
                'filename' => (isset($file_ext[1]))
                    ? $file_ext[1]
                    : $file[0],
            );
        } else {
            $info = pathinfo($path);
        }

        return !empty($part) && isset($info[$part])
            ? $info[$part]
            : $info;
    }


    /**
     * @param modManagerController $controller
     * @param modResource $resource
     */
    public function loadManagerFiles(modManagerController $controller, modResource $resource)
    {
        $cssUrl = $this->config['cssUrl'] . 'mgr/';
        $jsUrl = $this->config['jsUrl'] . 'mgr/';

        $properties = $resource->get('properties');
        if (empty($properties['ms2gallery']['media_source'])) {
            if (!$source_id = $resource->getTVValue('ms2Gallery')) {
                /** @var modContextSetting $setting */
                $setting = $this->modx->getObject('modContextSetting', array(
                    'key' => 'ms2gallery_source_default',
                    'context_key' => $resource->get('context_key'),
                ));
                $source_id = !empty($setting)
                    ? $setting->get('value')
                    : $this->modx->getOption('ms2gallery_source_default');
            }
            $resource->setProperties(array('media_source' => $source_id), 'ms2gallery');
            $resource->save();
        } else {
            $source_id = $properties['ms2gallery']['media_source'];
        }

        if (empty($source_id)) {
            $source_id = $this->modx->getOption('ms2gallery_source_default');
        }
        $resource->set('media_source', $source_id);

        $controller->addLexiconTopic('ms2gallery:default');
        $controller->addJavascript($jsUrl . 'ms2gallery.js');
        $controller->addLastJavascript($jsUrl . 'misc/strftime-min-1.3.js');
        $controller->addLastJavascript($jsUrl . 'misc/ms2.combo.js');
        $controller->addLastJavascript($jsUrl . 'misc/ms2.utils.js');
        $controller->addLastJavascript($jsUrl . 'misc/plupload/plupload.full.min.js');
        $controller->addLastJavascript($jsUrl . 'misc/ext.ddview.js');
        $controller->addLastJavascript($jsUrl . 'gallery.view.js');
        $controller->addLastJavascript($jsUrl . 'gallery.window.js');
        $controller->addLastJavascript($jsUrl . 'gallery.toolbar.js');
        $controller->addLastJavascript($jsUrl . 'gallery.panel.js');
        $controller->addCss($cssUrl . 'main.css');

        $source_config = array();
        /** @var modMediaSource $source */
        if ($source = $this->modx->getObject('modMediaSource', $source_id)) {
            $tmp = $source->getProperties();
            foreach ($tmp as $v) {
                $source_config[$v['name']] = $v['value'];
            }
        }
        $controller->addHtml('
        <script type="text/javascript">
            ms2Gallery.config = ' . json_encode($this->config) . ';
            ms2Gallery.config.media_source = ' . json_encode($source_config) . ';
        </script>');

        if ($this->modx->getOption('ms2gallery_new_tab_mode', null, true)) {
            $controller->addLastJavascript($jsUrl . 'tab.js');
        } else {
            $insert = '
                tabs.add({
                    xtype: "ms2gallery-page",
                    id: "ms2gallery-page",
                    title: _("ms2gallery"),
                    record: {
                        id: ' . $resource->get('id') . ',
                        source: ' . $source_id . ',
                    }
                });
            ';
            if ($this->modx->getCount('modPlugin', array('name' => 'AjaxManager', 'disabled' => false))) {
                $controller->addHtml('
                <script type="text/javascript">
                    Ext.onReady(function() {
                        window.setTimeout(function() {
                            var tabs = Ext.getCmp("modx-resource-tabs");
                            if (tabs) {
                                ' . $insert . '
                            }
                        }, 10);
                    });
                </script>');
            } else {
                $controller->addHtml('
                <script type="text/javascript">
                    Ext.ComponentMgr.onAvailable("modx-resource-tabs", function() {
                        var tabs = this;
                        tabs.on("beforerender", function() {
                            ' . $insert . '
                        });
                    });
                </script>');
            }
        }
    }


    /**
     *
     */
    protected function checkStat()
    {
        $key = strtolower(__CLASS__);
        /** @var modDbRegister $registry */
        $registry = $this->modx->getService('registry', 'registry.modRegistry')
            ->getRegister('user', 'registry.modDbRegister');
        $registry->connect();
        $registry->subscribe('/modstore/' . md5($key));
        if ($res = $registry->read(array('poll_limit' => 1, 'remove_read' => false))) {
            return;
        }
        $c = $this->modx->newQuery('transport.modTransportProvider', array('service_url:LIKE' => '%modstore%'));
        $c->select('username,api_key');
        /** @var modRest $rest */
        $rest = $this->modx->getService('modRest', 'rest.modRest', '', array(
            'baseUrl' => 'https://modstore.pro/extras',
            'suppressSuffix' => true,
            'timeout' => 1,
            'connectTimeout' => 1,
        ));

        if ($rest) {
            $level = $this->modx->getLogLevel();
            $this->modx->setLogLevel(modX::LOG_LEVEL_FATAL);
            $rest->post('stat', array(
                'package' => $key,
                'version' => $this::version,
                'keys' => $c->prepare() && $c->stmt->execute()
                    ? $c->stmt->fetchAll(PDO::FETCH_ASSOC)
                    : array(),
                'uuid' => $this->modx->uuid,
                'database' => $this->modx->config['dbtype'],
                'revolution_version' => $this->modx->version['code_name'].'-'.$this->modx->version['full_version'],
                'supports' => $this->modx->version['code_name'].'-'.$this->modx->version['full_version'],
                'http_host' => $this->modx->getOption('http_host'),
                'php_version' => XPDO_PHP_VERSION,
                'language' => $this->modx->getOption('manager_language'),
            ));
            $this->modx->setLogLevel($level);
        }
        $registry->subscribe('/modstore/');
        $registry->send('/modstore/', array(md5($key) => true), array('ttl' => 3600 * 24));
    }

}

