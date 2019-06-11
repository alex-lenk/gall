<?php

/**
 * Update an ecReplyTemplate
 */
class easyCommReplyTemplateUpdateProcessor extends modObjectUpdateProcessor {
	public $objectType = 'ecReplyTemplate';
	public $classKey = 'ecReplyTemplate';
	public $languageTopics = array('easycomm');
	//public $permission = 'save';

	/**
	 * @return bool
	 */
	public function beforeSet() {
		$id = (int)$this->getProperty('id');
		$text = trim($this->getProperty('text'));
		if (empty($id)) {
			return $this->modx->lexicon('ec_thread_err_ns');
		}

		if (empty($text)) {
			$this->modx->error->addField('text', $this->modx->lexicon('ec_thread_err_text'));
		}

        $preview = ecReplyTemplate::getTextPreview($text);
        $this->setProperty('preview', $preview);

		return parent::beforeSet();
	}
}

return 'easyCommReplyTemplateUpdateProcessor';
