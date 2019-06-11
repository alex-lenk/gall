<?php

/**
 * Update an Item
 */
class SeeTooResourceUpdateProcessor extends modObjectUpdateProcessor {
	public $objectType = 'SeeTooResource';
	public $classKey = 'SeeTooResource';
	public $languageTopics = array('seetoo');
	//public $permission = 'save';


	/**
	 * We doing special check of permission
	 * because of our objects is not an instances of modAccessibleObject
	 *
	 * @return bool|string
	 */
	public function beforeSave() {
		if (!$this->checkPermissions()) {
			return $this->modx->lexicon('access_denied');
		}

		return true;
	}


	/**
	 * @return bool
	 */
	public function beforeSet() {
		$id = (int)$this->getProperty('id');
		$resource_to = trim($this->getProperty('resource_to'));
		$key = trim($this->getProperty('key'));
		$key_object = $this->object->get('key');
		if (empty($id)) {
			return $this->modx->lexicon('seetoo_resource_err_ns');
		}

		if (empty($resource_to)) {
			$this->modx->error->addField('resource_to', $this->modx->lexicon('seetoo_resource_err_resource_to'));
		}
		if (empty($key) && empty($key_object)) {
			$key = 'view';
			$this->setProperty('key', $key);
		}

		return parent::beforeSet();
	}
}

return 'SeeTooResourceUpdateProcessor';
