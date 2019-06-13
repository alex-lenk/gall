<?php

/**
 * @property int id
 * @property string hash
 * @property int resource_id
 * @property int parent
 */
class msResourceFile extends xPDOSimpleObject
{
    /** @var modPhpThumb $phpThumb */
    public $phpThumb;
    /** @var ms2Gallery $ms2Gallery */
    public $ms2Gallery;
    /** @var modMediaSource $mediaSource */
    public $mediaSource;


    /**
     * @param modMediaSource $mediaSource
     *
     * @return bool|string
     */
    public function prepareSource(modMediaSource $mediaSource = null)
    {
        $this->ms2Gallery = $this->xpdo->getService('ms2gallery', 'ms2Gallery',
            MODX_CORE_PATH . 'components/ms2gallery/model/ms2gallery/'
        );
        if (!$this->ms2Gallery) {
            return 'Could not load class ms2Gallery!';
        }
        if ($mediaSource) {
            $this->mediaSource = $mediaSource;

            return true;
        } elseif (is_object($this->mediaSource) && $this->mediaSource instanceof modMediaSource) {
            return true;
        } else {
            /** @var modResource $resource */
            if ($resource = $this->getOne('Resource')) {
                $properties = $resource->getProperties('ms2gallery');
                $source = $properties['media_source'];
                $ctx = $resource->get('context_key');
                $this->mediaSource = $this->ms2Gallery->initializeMediaSource($ctx, $source);
                if (!$this->mediaSource || !($this->mediaSource instanceof modMediaSource)) {
                    return 'Could not initialize media source for resource with id = ' . $this->get('resource_id');
                } else {
                    return true;
                }
            } else {
                return 'Could not load file resource with id = ' . $this->get('resource_id');
            }
        }
    }


    /**
     * @param modMediaSource $mediaSource
     *
     * @return bool|string
     */
    public function generateThumbnails(modMediaSource $mediaSource = null)
    {
        if ($this->get('type') != 'image' || $this->get('parent') != 0) {
            return true;
        }

        $prepare = $this->prepareSource($mediaSource);
        if ($prepare !== true) {
            return $prepare;
        }

        $this->mediaSource->errors = array();
        $filename = $this->get('path') . $this->get('file');
        $info = $this->mediaSource->getObjectContents($filename);
        if (!is_array($info)) {
            return "[ms2Gallery] Could not retrieve contents of file {$filename} from media source.";
        } elseif (!empty($this->mediaSource->errors['file'])) {
            return "[ms2Gallery] Could not retrieve file {$filename} from media source: " .
                $this->mediaSource->errors['file'];
        }

        $properties = $this->mediaSource->getProperties();
        $thumbnails = array();
        if (array_key_exists('thumbnails', $properties) && !empty($properties['thumbnails']['value'])) {
            $thumbnails = json_decode($properties['thumbnails']['value'], true);
        } elseif (array_key_exists('thumbnail', $properties) && !empty($properties['thumbnail']['value'])) {
            $thumbnails = json_decode($properties['thumbnail']['value'], true);
        }
        if (empty($thumbnails)) {
            $thumbnails = array(
                'small' => array(
                    'w' => 120,
                    'h' => 90,
                    'q' => 90,
                    'zc' => 'T',
                    'bg' => '000000',
                    'f' => !empty($properties['thumbnailType']['value'])
                        ? $properties['thumbnailType']['value']
                        : 'jpg',
                ),
            );
        }

        foreach ($thumbnails as $k => $options) {
            if (empty($options['f'])) {
                $options['f'] = !empty($properties['thumbnailType']['value'])
                    ? $properties['thumbnailType']['value']
                    : 'jpg';
            }
            if (empty($options['name']) && !is_numeric($k)) {
                $options['name'] = $k;
            }
            if ($image = $this->makeThumbnail($options, $info)) {
                $this->saveThumbnail($image, $options);
            }
        }

        return true;
    }


    /**
     * @param array $options
     * @param array $info
     *
     * @return bool|null
     */
    public function makeThumbnail($options = array(), array $info)
    {
        if (!class_exists('modPhpThumb')) {
            if (file_exists(MODX_CORE_PATH . 'model/phpthumb/modphpthumb.class.php')) {
                /** @noinspection PhpIncludeInspection */
                require MODX_CORE_PATH . 'model/phpthumb/modphpthumb.class.php';
            } else {
                $this->xpdo->getService('phpthumb', 'modPhpThumb');
            }
        }
        /** @noinspection PhpParamsInspection */
        $phpThumb = new modPhpThumb($this->xpdo);
        $phpThumb->initialize();

        $tf = tempnam(MODX_BASE_PATH, 'ms2g_');
        file_put_contents($tf, $info['content']);
        $phpThumb->setSourceFilename($tf);

        foreach ($options as $k => $v) {
            $phpThumb->setParameter($k, $v);
        }

        if ($phpThumb->GenerateThumbnail()) {
            if ($phpThumb->RenderOutput()) {
                $this->xpdo->log(modX::LOG_LEVEL_INFO, '[ms2Gallery] phpThumb messages for "' . $this->get('url') .
                    '". ' . print_r($phpThumb->debugmessages, 1)
                );
                @unlink($tf);

                return $phpThumb->outputImageData;
            }
        }
        $this->xpdo->log(modX::LOG_LEVEL_ERROR, '[ms2Gallery] Could not generate thumbnail for "' . $this->get('url') .
            '". ' . print_r($phpThumb->debugmessages, 1)
        );
        @unlink($tf);

        return false;
    }


    /**
     * @param $raw_image
     * @param array $options
     *
     * @return bool
     */
    public function saveThumbnail($raw_image, $options = array())
    {
        $filename = $this->ms2Gallery->pathinfo($this->get('file'), 'filename') . '.' . $options['f'];
        if (!empty($options['name'])) {
            $thumb_dir = preg_replace('#[^\w]#', '', $options['name']);
        }
        if (empty($thumb_dir)) {
            $thumb_dir = $options['w'] . 'x' . $options['h'];
        }
        $path = $this->get('path') . $thumb_dir . '/';

        /** @var msResourceFile $resource_file */
        /** @noinspection PhpUndefinedFieldInspection */
        $resource_file = $this->xpdo->newObject('msResourceFile', array_merge(
            $this->toArray('', true),
            array(
                'resource_id' => $this->get('resource_id'),
                'parent' => $this->get('id'),
                'file' => $filename,
                'path' => $path,
                'source' => $this->mediaSource->get('id'),
                'createdon' => date('Y-m-d H:i:s'),
                'createdby' => $this->xpdo->user->id,
                'hash' => sha1($raw_image),
            )
        ));

        $properties = $this->get('properties');
        $properties['size'] = strlen($raw_image);
        unset($properties['width'], $properties['height'], $properties['bits'], $properties['mime']);

        $tf = tempnam(MODX_BASE_PATH, 'ms2g_');
        file_put_contents($tf, $raw_image);
        $tmp = getimagesize($tf);
        if (is_array($tmp)) {
            $resource_file->set('properties', array_merge(
                $properties,
                array(
                    'width' => $tmp[0],
                    'height' => $tmp[1],
                    'bits' => $tmp['bits'],
                    'mime' => $tmp['mime'],
                )
            ));
        }
        unlink($tf);

        $this->mediaSource->createContainer($resource_file->get('path'), '/');
        $file = $this->mediaSource->createObject(
            $resource_file->get('path'),
            $resource_file->get('file'),
            $raw_image
        );

        if ($file) {
            $resource_file->set('url',
                $this->mediaSource->getObjectUrl($resource_file->get('path') . $resource_file->get('file')));

            return $resource_file->save();
        } else {
            return false;
        }
    }


    /**
     * @param array|string $k
     * @param null $format
     * @param null $formatTemplate
     *
     * @return mixed
     */
    public function get($k, $format = null, $formatTemplate = null)
    {
        if (strtolower($k) == 'tags') {
            $tags = array();
            $q = $this->xpdo->newQuery('msResourceFileTag', array('file_id' => $this->get('id')));
            $q->select('tag');
            if ($q->prepare() && $q->stmt->execute()) {
                $tags = $q->stmt->fetchAll(PDO::FETCH_COLUMN);
            }

            return $tags;
        } else {
            return parent::get($k, $format, $formatTemplate);
        }
    }


    /**
     * @param null $cacheFlag
     *
     * @return bool
     */
    public function save($cacheFlag = null)
    {
        if ($this->isDirty('rank')) {
            $table = $this->xpdo->getTableName('msResourceFile');
            $this->xpdo->exec("UPDATE {$table} SET rank = {$this->get('rank')} WHERE parent = {$this->id}");
        }

        $save = parent::save($cacheFlag);
        $tags = parent::get('tags');

        if (is_array($tags)) {
            $id = $this->get('id');
            $table = $this->xpdo->getTableName('msResourceFileTag');
            $this->xpdo->exec("DELETE FROM {$table} WHERE `file_id` = $id;");

            if (!empty($tags)) {
                $values = array();
                foreach ($tags as $tag) {
                    $tag = trim($tag);
                    if (!empty($tag)) {
                        $values[] = '(' . $id . ',"' . $tag . '")';
                    }
                }
                if (!empty($values)) {
                    $this->xpdo->exec("INSERT INTO {$table} (`file_id`,`tag`) VALUES " . implode(',', $values));
                }
            }
        }

        if ($this->xpdo->getOption('ms2gallery_sync_ms2')) {
            $this->updateMS2File();
        }
        if ($this->xpdo->getOption('ms2gallery_sync_tickets')) {
            $this->updateTicketFile();
        }

        return $save;
    }


    /**
     * @return array|mixed
     */
    public function getFirstThumbnail()
    {
        $c = $this->xpdo->newQuery('msResourceFile', array(
            'parent' => $this->id,
            'type' => 'image',
        ));
        $c->limit(1);
        $c->sortby('id', 'ASC');
        $c->select('id,url');

        $res = array();
        if ($c->prepare() && $c->stmt->execute()) {
            $res = $c->stmt->fetch(PDO::FETCH_ASSOC);
        }

        return $res;
    }


    /**
     * @param array $ancestors
     *
     * @return bool
     */
    public function remove(array $ancestors = array())
    {
        $res = $this->prepareSource();
        if ($res !== true) {
            $this->xpdo->log(xPDO::LOG_LEVEL_ERROR, 'Could not initialize media source:"' . $res . '"');

            return $res;
        }
        if (!$this->mediaSource->removeObject($this->get('path') . $this->get('file'))) {
            $this->xpdo->log(xPDO::LOG_LEVEL_ERROR,
                'Could not remove file at "' . $this->get('path') . $this->get('file') . '": ' . $this->mediaSource->errors['file']
            );
        }

        $children = $this->xpdo->getIterator('msResourceFile', array('parent' => $this->get('id')));
        /** @var msResourceFile $child */
        foreach ($children as $child) {
            $child->remove();
        }

        return parent::remove($ancestors);
    }


    /**
     * Recursive file rename
     *
     * @param string $new_name
     * @param string $old_name
     *
     * @return bool
     */
    public function rename($new_name, $old_name = '')
    {
        if (empty($old_name)) {
            $old_name = $this->get('file');
        }

        $path = $this->get('path');
        $extension = strtolower(pathinfo($old_name, PATHINFO_EXTENSION));
        $name = preg_replace('#\.' . $extension . '$#', '', $new_name);
        $name .= '.' . $extension;

        // Processing children
        $children = $this->getMany('Children');
        if (!empty($children)) {
            /** @var msResourceFile $child */
            foreach ($children as $child) {
                $child->rename($new_name, $child->get('file'));
            }
        }

        $this->prepareSource();
        if ($this->mediaSource->renameObject($path . $old_name, $name)) {
            $this->set('file', $name);
            $this->set('url', $this->mediaSource->getObjectUrl($path . $name));

            return $this->save();
        } else {
            return false;
        }
    }


    /**
     * @return bool
     */
    public function updateMS2File()
    {
        /** @var msProductFile $file */
        $file = $this->xpdo->getObject('msProductFile', array(
            'hash' => $this->hash,
            'product_id' => $this->resource_id,
        ));
        if ($file) {
            $data = $this->toArray();
            unset($data['parent']);
            $file->fromArray($data);

            return $file->save();
        }

        return false;
    }


    /**
     * @return bool
     */
    public function updateTicketFile()
    {
        if ($this->get('parent')) {
            return false;
        }
        /** @var TicketFile $file */
        $file = $this->xpdo->getObject('TicketFile', array(
            'hash' => $this->hash,
            'parent' => $this->resource_id,
            'class' => 'Ticket',
        ));
        if ($file) {
            $data = $this->toArray();
            unset($data['parent']);
            $file->fromArray($data);

            $c = $this->xpdo->newQuery('msResourceFile', array('parent' => $this->id));
            $c->sortby('rank', 'ASC');
            $c->select('path, url');
            if ($c->prepare() && $c->stmt->execute()) {
                $thumbs = array();
                while ($thumb = $c->stmt->fetch(PDO::FETCH_ASSOC)) {
                    $alias = end(explode('/', trim($thumb['path'], '/')));
                    $thumbs[$alias] = $thumb['url'];
                    if ($alias == 'thumb') {
                        $file->set('thumb', $thumb['url']);
                    }
                }
                $file->set('thumbs', $thumbs);
            }

            return $file->save();
        }

        return false;
    }
}