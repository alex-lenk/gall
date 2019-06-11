<?php

/**
 * Get a list of Items
 */
class SeeTooResourceGetListProcessor extends modObjectGetListProcessor {
	public $objectType = 'SeeTooResource';
	public $classKey = 'SeeTooResource';
	public $defaultSortField = 'view';
	public $defaultSortDirection = 'DESC';
	//public $permission = 'list';


	/**
	 * * We doing special check of permission
	 * because of our objects is not an instances of modAccessibleObject
	 *
	 * @return boolean|string
	 */
	public function beforeQuery() {
		if (!$this->checkPermissions()) {
			return $this->modx->lexicon('access_denied');
		}

		return true;
	}


	/**
	 * @param xPDOQuery $c
	 *
	 * @return xPDOQuery
	 */
	public function prepareQueryBeforeCount(xPDOQuery $c) {
		$c->innerJoin('modResource', 'Resource', array('SeeTooResource.resource_to = Resource.id'));
		$c->select(['SeeTooResource.id', 'SeeTooResource.resource_to', 'Resource.pagetitle', 'SeeTooResource.view', 'SeeTooResource.active']);

		$resource = trim($this->getProperty('resource'));
		if ($resource) {
			$c->where(array(
				'resource_from' => $resource
			));
		}

		return $c;
	}


	/**
	 * @param xPDOObject $object
	 *
	 * @return array
	 */
	public function prepareRow(xPDOObject $object) {
		$array = $object->toArray();
		$array['actions'] = array();

		// Edit
		$array['actions'][] = array(
			'cls' => '',
			'icon' => 'icon icon-edit',
			'title' => $this->modx->lexicon('seetoo_resource_update'),
			//'multiple' => $this->modx->lexicon('SeeToo_items_update'),
			'action' => 'updateItem',
			'button' => true,
			'menu' => true,
		);

		if (!$array['active']) {
			$array['actions'][] = array(
				'cls' => '',
				'icon' => 'icon icon-power-off action-green',
				'title' => $this->modx->lexicon('seetooo_resource_enable'),
				'multiple' => $this->modx->lexicon('seetoo_resources_enable'),
				'action' => 'enableItem',
				'button' => true,
				'menu' => true,
			);
		}
		else {
			$array['actions'][] = array(
				'cls' => '',
				'icon' => 'icon icon-power-off action-gray',
				'title' => $this->modx->lexicon('seetoo_resource_disable'),
				'multiple' => $this->modx->lexicon('seetoo_resources_disable'),
				'action' => 'disableItem',
				'button' => true,
				'menu' => true,
			);
		}

		// Remove
		$array['actions'][] = array(
			'cls' => '',
			'icon' => 'icon icon-trash-o action-red',
			'title' => $this->modx->lexicon('seetoo_resource_remove'),
			'multiple' => $this->modx->lexicon('seetoo_resources_remove'),
			'action' => 'removeItem',
			'button' => true,
			'menu' => true,
		);

		return $array;
	}

}

return 'SeeTooResourceGetListProcessor';