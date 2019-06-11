<?php

/**
 * Get a list of ecReplyTemplate
 */
class easyCommReplyTemplateGetListProcessor extends modObjectGetListProcessor {
	public $objectType = 'ecReplyTemplate';
	public $classKey = 'ecReplyTemplate';
	public $defaultSortField = 'id';
	public $defaultSortDirection = 'DESC';
	//public $permission = 'list';

	/**
	 * @param xPDOQuery $c
	 *
	 * @return xPDOQuery
	 */
	public function prepareQueryBeforeCount(xPDOQuery $c) {

		$query = trim($this->getProperty('query'));
		if ($query) {
			$c->where(array(
				'text:LIKE' => "%{$query}%"
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

return 'easyCommReplyTemplateGetListProcessor';