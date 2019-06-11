<?php

/**
 * Get an ecReplyTemplate
 */
class easyCommReplyTemplateGetProcessor extends modObjectGetProcessor {
	public $objectType = 'ecReplyTemplate';
	public $classKey = 'ecReplyTemplate';
	public $languageTopics = array('easycomm:default');
	//public $permission = 'view';

}

return 'easyCommReplyTemplateGetProcessor';