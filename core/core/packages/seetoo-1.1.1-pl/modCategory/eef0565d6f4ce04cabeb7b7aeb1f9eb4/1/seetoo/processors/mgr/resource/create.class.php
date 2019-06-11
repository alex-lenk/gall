<?php

/**
 * Create an Item
 */
class SeeTooResourceCreateProcessor extends modObjectCreateProcessor {
	public $objectType = 'SeeTooResource';
	public $classKey = 'SeeTooResource';
	public $languageTopics = array('seetoo');
	//public $permission = 'create';


	/**
	 * @return bool
	 */
	public function beforeSet() {
		$resource_from = trim($this->getProperty('resource_from'));
		$resource_to = trim($this->getProperty('resource_to'));
		$key = trim($this->getProperty('key'));

		if (empty($resource_from)) {
			$this->modx->error->addField('resource_from', $this->modx->lexicon('seetoo_resource_err_resource_from'));
		}
		if (empty($resource_to)) {
			$this->modx->error->addField('resource_to', $this->modx->lexicon('seetoo_resource_err_resource_to'));
		}
		if (empty($key)) {
			$key = 'view';
			$this->setProperty('key', $key);
		}
		if ($this->modx->getCount($this->classKey, array('resource_from' => $resource_from, 'resource_to' => $resource_to, 'key' => $key))) {
			$this->modx->error->addField('resource_to', $this->modx->lexicon('seetoo_resource_err_ae'));
		}

		return parent::beforeSet();
	}

}

return 'SeeTooResourceCreateProcessor';