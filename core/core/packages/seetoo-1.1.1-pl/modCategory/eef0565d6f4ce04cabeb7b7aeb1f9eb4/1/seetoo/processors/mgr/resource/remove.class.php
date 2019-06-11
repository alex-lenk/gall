<?php

/**
 * Remove an Items
 */
class SeeTooResourceRemoveProcessor extends modObjectProcessor {
	public $objectType = 'SeeTooResource';
	public $classKey = 'SeeTooResource';
	public $languageTopics = array('seetoo');
	//public $permission = 'remove';


	/**
	 * @return array|string
	 */
	public function process() {
		if (!$this->checkPermissions()) {
			return $this->failure($this->modx->lexicon('access_denied'));
		}

		$ids = $this->modx->fromJSON($this->getProperty('ids'));
		if (empty($ids)) {
			return $this->failure($this->modx->lexicon('SeeToo_item_err_ns'));
		}

		foreach ($ids as $id) {
			/** @var SeeTooItem $object */
			if (!$object = $this->modx->getObject($this->classKey, $id)) {
				return $this->failure($this->modx->lexicon('SeeToo_item_err_nf'));
			}

			$object->remove();
		}

		return $this->success();
	}

}

return 'SeeTooResourceRemoveProcessor';