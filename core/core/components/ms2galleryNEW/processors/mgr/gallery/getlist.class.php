<?php

class msResourceFileGetListProcessor extends modObjectGetListProcessor
{
    public $classKey = 'msResourceFile';
    public $defaultSortField = 'rank';
    public $defaultSortDirection = 'ASC';
    public $languageTopics = array('default', 'ms2gallery:default');
    protected $thumb;


    /**
     * @return mixed
     */
    public function process()
    {
        /** @var modResource $resource */
        if ($resource = $this->modx->getObject('modResource', (int)$this->getProperty('resource_id'))) {
            $properties = $resource->getProperties('ms2gallery');
            if (!empty($properties['media_source'])) {
                /** @var modMediaSource $source */
                if ($source = $this->modx->getObject('modMediaSource', (int)$properties['media_source'])) {
                    $properties = $source->getProperties();
                    $thumbnails = array();
                    if (!empty($properties['thumbnails']['value'])) {
                        $thumbnails = json_decode($properties['thumbnails']['value'], true);
                    } elseif (!empty($properties['thumbnail']['value'])) {
                        $thumbnails = json_decode($properties['thumbnail']['value'], true);
                    }
                    if (!empty($thumbnails)) {
                        foreach ($thumbnails as $key => $thumb) {
                            if (!is_numeric($key)) {
                                $this->thumb = $key;
                            } elseif (!empty($thumb['w']) || !empty($thumb['h'])) {
                                $this->thumb = @$thumb['w'] . 'x' . @$thumb['h'];
                            }
                            break;
                        }
                    }
                }
            }
        }
        if (!$this->thumb) {
            $this->thumb = $this->modx->getOption('ms2gallery_thumbnail_size', null, 'small', true);
        }

        $beforeQuery = $this->beforeQuery();
        if ($beforeQuery !== true) {
            return $this->failure($beforeQuery);
        }
        $data = $this->getData();

        return $this->outputArray($data['results'], $data['total']);
    }


    /**
     * Get the data of the query
     * @return array
     */
    public function getData()
    {
        $data = array();
        $limit = intval($this->getProperty('limit'));
        $start = intval($this->getProperty('start'));

        $c = $this->modx->newQuery($this->classKey);
        $c = $this->prepareQueryBeforeCount($c);
        $data['total'] = $this->modx->getCount($this->classKey, $c);
        $c = $this->prepareQueryAfterCount($c);
        $c->select($this->modx->getSelectColumns($this->classKey, $this->classKey));

        $sortClassKey = $this->getSortClassKey();
        $sortKey = $this->modx->getSelectColumns($sortClassKey, $this->getProperty('sortAlias', $sortClassKey), '',
            array($this->getProperty('sort')));
        if (empty($sortKey)) {
            $sortKey = $this->getProperty('sort');
        }
        $c->sortby($sortKey, $this->getProperty('dir'));
        if ($limit > 0) {
            $c->limit($limit, $start);
        }

        $data['results'] = array();
        if ($c->prepare() && $c->stmt->execute()) {
            while ($row = $c->stmt->fetch(PDO::FETCH_ASSOC)) {
                $data['results'][] = $this->prepareArray($row);
            }
        } else {
            $this->modx->log(modX::LOG_LEVEL_ERROR, print_r($c->stmt->errorInfo(), true));
        }

        return $data;
    }


    /**
     * @param xPDOQuery $c
     *
     * @return xPDOQuery
     */
    public function prepareQueryBeforeCount(xPDOQuery $c)
    {
        $c->where(array(
            'parent' => (int)$this->getProperty('parent'),
            'resource_id' => (int)$this->getProperty('resource_id'),
        ));

        $query = trim($this->getProperty('query'));
        if (!empty($query)) {
            $c->where(array(
                'file:LIKE' => "%{$query}%",
                'OR:name:LIKE' => "%{$query}%",
                'OR:alt:LIKE' => "%{$query}%",
                'OR:description:LIKE' => "%{$query}%",
                'OR:add:LIKE' => "%{$query}%",
            ));
        }

        return $c;
    }


    public function prepareQueryAfterCount(xPDOQuery $c)
    {
        $c->leftJoin('modMediaSource', 'Source');
        $c->leftJoin($this->classKey, 'Thumb',
            $this->classKey . '.id = Thumb.parent AND 
            Thumb.path LIKE "%/' . $this->thumb . '/"'
        );
        $c->select('Source.name as source_name, Thumb.url as thumbnail');
        $c->groupby($this->classKey . '.id, thumbnail');
        $tags = array_map('trim', explode(',', $this->getProperty('tags')));
        if (!empty($tags[0])) {
            $tags = implode("','", $tags);
            $c->innerJoin('msResourceFileTag', 'Tag',
                "{$this->classKey}.id = Tag.file_id AND Tag.tag IN ('" . $tags . "')"
            );
            $c->groupby($this->classKey . '.id');
        }

        return $c;
    }


    /**
     * @param array $row
     *
     * @return array
     */
    public function prepareArray(array $row)
    {

        if (empty($row['thumbnail'])) {
            if ($row['type'] != 'image') {
                $row['thumbnail'] = (file_exists(MODX_ASSETS_PATH . 'components/ms2gallery/img/mgr/extensions/' . $row['type'] . '.png'))
                    ? MODX_ASSETS_URL . 'components/ms2gallery/img/mgr/extensions/' . $row['type'] . '.png'
                    : MODX_ASSETS_URL . 'components/ms2gallery/img/mgr/extensions/other.png';
            } else {
                $row['thumbnail'] = MODX_ASSETS_URL . 'components/ms2gallery/img/web/ms2_small.png';
            }
        }

        $row['class'] = empty($row['active'])
            ? 'inactive'
            : 'active';

        $row['properties'] = strpos($row['properties'], '{') === 0
            ? json_decode($row['properties'], true)
            : array();

        $row['active'] = !empty($row['active']);

        $row['tags'] = array();
        $q = $this->modx->newQuery('msResourceFileTag', array('file_id' => $row['id']));
        $q->select('tag');
        if ($q->prepare() && $q->stmt->execute()) {
            while ($tag = $q->stmt->fetchColumn()) {
                $row['tags'][] = array('tag' => $tag);
            }
        }

        $row['actions'] = array();

        $row['actions'][] = array(
            'cls' => '',
            'icon' => 'icon icon-edit',
            'title' => $this->modx->lexicon('ms2gallery_file_update'),
            'action' => 'updateFile',
            'button' => false,
            'menu' => true,
        );

        $row['actions'][] = array(
            'cls' => '',
            'icon' => 'icon icon-tags',
            'title' => $this->modx->lexicon('ms2gallery_file_edit_tags'),
            'multiple' => $this->modx->lexicon('ms2gallery_file_edit_tags'),
            'action' => 'editTags',
            'button' => false,
            'menu' => true,
        );

        $row['actions'][] = array(
            'cls' => '',
            'icon' => 'icon icon-share',
            'title' => $this->modx->lexicon('ms2gallery_file_show'),
            'action' => 'showFile',
            'button' => false,
            'menu' => true,
        );

        if ($row['type'] == 'image') {
            $row['actions'][] = array(
                'cls' => '',
                'icon' => 'icon icon-refresh',
                'title' => $this->modx->lexicon('ms2gallery_image_generate_thumbs'),
                'multiple' => $this->modx->lexicon('ms2gallery_image_generate_thumbs'),
                'action' => 'generateThumbs',
                'button' => false,
                'menu' => true,
            );
        }

        if (!$row['active']) {
            $row['actions'][] = array(
                'cls' => '',
                'icon' => 'icon icon-power-off action-green',
                'title' => $this->modx->lexicon('ms2gallery_file_activate'),
                'multiple' => $this->modx->lexicon('ms2gallery_file_activate_multiple'),
                'action' => 'activateFiles',
                'button' => false,
                'menu' => true,
            );
        } else {
            $row['actions'][] = array(
                'cls' => '',
                'icon' => 'icon icon-power-off action-yellow',
                'title' => $this->modx->lexicon('ms2gallery_file_inactivate'),
                'multiple' => $this->modx->lexicon('ms2gallery_file_inactivate_multiple'),
                'action' => 'inActivateFiles',
                'button' => false,
                'menu' => true,
            );
        }

        $row['actions'][] = array(
            'cls' => '',
            'icon' => 'icon icon-trash-o action-red',
            'title' => $this->modx->lexicon('ms2gallery_file_delete'),
            'multiple' => $this->modx->lexicon('ms2gallery_file_delete_multiple'),
            'action' => 'deleteFiles',
            'button' => false,
            'menu' => true,
        );

        return $row;
    }
}

return 'msResourceFileGetListProcessor';
