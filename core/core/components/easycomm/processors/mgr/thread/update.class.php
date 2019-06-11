<?php

/**
 * Update an ecThread
 */
class easyCommThreadUpdateProcessor extends modObjectUpdateProcessor {
	public $objectType = 'ecThread';
	public $classKey = 'ecThread';
	public $languageTopics = array('easycomm');
	public $permission = 'ec_thread_save';

	/**
	 * @return bool
	 */
	public function beforeSet() {
		$id = (int)$this->getProperty('id');
		$name = trim($this->getProperty('name'));
		if (empty($id)) {
			return $this->modx->lexicon('ec_thread_err_ns');
		}

		if (empty($name)) {
			$this->modx->error->addField('name', $this->modx->lexicon('ec_thread_err_name'));
		}
		elseif ($this->modx->getCount($this->classKey, array('name' => $name, 'id:!=' => $id))) {
			$this->modx->error->addField('name', $this->modx->lexicon('ec_thread_err_ae'));
		}

		return parent::beforeSet();
	}
}

return 'easyCommThreadUpdateProcessor';
