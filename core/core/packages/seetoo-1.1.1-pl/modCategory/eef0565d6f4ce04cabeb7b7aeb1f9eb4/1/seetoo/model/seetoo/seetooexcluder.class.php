<?php

interface SeeTooExcluderInterface
{
    public function check(modResource $resource_from, modResource $resource_to);
}

class SeeTooExcluder implements SeeTooExcluderInterface
{
    protected $seetoo;
    protected $config;

    public function __construct(SeeToo $seetoo, $config)
    {
        $this->seetoo = $seetoo;
        $this->config = $config;
    }

    public function check(modResource $resource_from, modResource $resource_to)
    {
        $exclude_where = json_decode($this->seetoo->modx->getOption('seetoo_exclude_where'), 1);
        if (count($exclude_where)) {
            foreach ($exclude_where as $key => $value) {
                $resource_from_value = $resource_from->get($key);
                $resource_to_value = $resource_to->get($key);
                if ($resource_from_value !== $value && $resource_to_value !== $value) {
                    continue;
                }
                $this->seetoo->modx->log(MODX::LOG_LEVEL_INFO, 'Link ' . $resource_from->id . ' --> ' . $resource_to->id . ' excluded');
                return false;
            }
        }
        return true;
    }

}