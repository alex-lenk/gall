<?php

/**
 * Get an ecThread
 */
class easyCommThreadGetProcessor extends modObjectGetProcessor {
	public $objectType = 'ecThread';
	public $classKey = 'ecThread';
	public $languageTopics = array('easycomm:default');
	//public $permission = 'view';

}

return 'easyCommThreadGetProcessor';