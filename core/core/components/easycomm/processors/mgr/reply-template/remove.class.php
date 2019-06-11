<?php

/**
 * Remove an ecReplyTemplate
 */
class easyCommReplyTemplateRemoveProcessor extends modObjectRemoveProcessor {
    /** @var ecReplyTemplate $object */
    public $object;
    public $objectType = 'ecReplyTemplate';
    public $classKey = 'ecReplyTemplate';
    public $languageTopics = array('easycomm');
    //public $permission = 'remove';

    /**
     * Log the removal manager action
     * @return void
     */
    public function logManagerAction()
    {

    }

}

return 'easyCommReplyTemplateRemoveProcessor';
