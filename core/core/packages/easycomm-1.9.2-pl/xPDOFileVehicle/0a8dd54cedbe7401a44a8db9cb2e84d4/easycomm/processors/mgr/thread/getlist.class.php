<?php

/**
 * Get a list of Items
 */
class easyCommThreadGetListProcessor extends modObjectGetListProcessor {
	public $objectType = 'ecThread';
	public $classKey = 'ecThread';
	public $defaultSortField = 'id';
	public $defaultSortDirection = 'DESC';
	//public $permission = 'list';

	/**
	 * @param xPDOQuery $c
	 *
	 * @return xPDOQuery
	 */
	public function prepareQueryBeforeCount(xPDOQuery $c) {

        $resource_id = intval($this->getProperty('resource_id'));
        if(!empty($resource_id)) {
            $c->where(array('resource' => $resource_id));
        }

		$query = trim($this->getProperty('query'));
		if ($query) {
			$c->where(array(
				'name:LIKE' => "%{$query}%",
				'OR:title:LIKE' => "%{$query}%",
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
		return $array;
	}

}

return 'easyCommThreadGetListProcessor';