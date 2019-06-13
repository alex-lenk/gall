<?php


class msResourceFileRemoveProcessor extends modObjectRemoveProcessor
{
    public $classKey = 'msResourceFile';
    public $languageTopics = array('ms2gallery:default');


    /**
     * @return array|string
     */
    public function process()
    {
        $id = $this->getProperty('id');
        if (empty($id)) {
            return $this->failure($this->modx->lexicon('ms2gallery_err_ns'));
        }
        $resource_id = 0;
        /** @var msResourceFile $file */
        if ($file = $this->modx->getObject('msResourceFile', $id)) {
            $resource_id = $file->get('resource_id');
            $file->remove();
        }

        /** @var ms2Gallery $ms2Gallery */
        $ms2Gallery = $this->modx->getService('ms2gallery');
        $ms2Gallery->rankResourceImages($resource_id, true);

        if ($this->modx->getOption('ms2gallery_sync_ms2')) {
            /** @var msProductData $product */
            if ($product = $this->modx->getObject('msProductData', (int)$resource_id)) {
                $ms2Gallery->syncFiles('ms2', $resource_id);
                if ($thumb = $product->updateProductImage()) {
                    return $this->modx->error->success('', array('thumb' => $thumb));
                }
            }
        }

        if ($this->modx->getOption('ms2gallery_sync_tickets')) {
            if ($ticket = $this->modx->getObject('Ticket', array('id' => $resource_id, 'class_key' => 'Ticket'))) {
                $ms2Gallery->syncFiles('tickets', $resource_id);
            }
        }

        return $this->success();
    }
}

return 'msResourceFileRemoveProcessor';