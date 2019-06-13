<?php

class msResourceFileSortProcessor extends modObjectProcessor
{


    /**
     * It is adapted code from
     * https://github.com/splittingred/Gallery/blob/a51442648fde1066cf04d46550a04265b1ad67da/core/components/gallery/processors/mgr/item/sort.php
     *
     * @return array|string
     */
    public function process()
    {
        /** @var msResourceFile $source */
        $source = $this->modx->getObject('msResourceFile', (int)$this->getProperty('source'));
        /** @var msResourceFile $target */
        $target = $this->modx->getObject('msResourceFile', (int)$this->getProperty('target'));
        $resource_id = (int)$this->getProperty('resource_id');

        if (empty($source) || empty($target) || empty($resource_id)) {
            return $this->modx->error->failure();
        }

        if ($source->get('rank') < $target->get('rank')) {
            $this->modx->exec("UPDATE {$this->modx->getTableName('msResourceFile')}
                SET rank = rank - 1 WHERE
                    resource_id = " . $resource_id . "
                    AND rank <= {$target->get('rank')}
                    AND rank > {$source->get('rank')}
                    AND rank > 0
            ");
            $newRank = $target->get('rank');
        } else {
            $this->modx->exec("UPDATE {$this->modx->getTableName('msResourceFile')}
                SET rank = rank + 1 WHERE
                    resource_id = " . $resource_id . "
                    AND rank >= {$target->get('rank')}
                    AND rank < {$source->get('rank')}
            ");
            $newRank = $target->get('rank');
        }
        $source->set('rank', $newRank);
        $source->save();

        /** @var ms2Gallery $ms2Gallery */
        $ms2Gallery = $this->modx->getService('ms2gallery');
        $ms2Gallery->rankResourceImages($resource_id);

        if ($this->modx->getOption('ms2gallery_sync_ms2')) {
            /** @var msProductData $product */
            if ($product = $this->modx->getObject('msProductData', (int)$resource_id)) {
                $ms2Gallery->syncFiles('ms2', $resource_id);
                if ($thumb = $product->updateProductImage()) {
                    return $this->modx->error->success('', array('thumb' => $thumb));
                }
            }
        }

        return $this->modx->error->success();
    }
}

return 'msResourceFileSortProcessor';
