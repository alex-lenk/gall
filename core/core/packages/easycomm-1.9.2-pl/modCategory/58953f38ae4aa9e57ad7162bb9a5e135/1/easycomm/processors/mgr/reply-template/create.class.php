<?php

/**
 * Create an ecReplyTemplate
 */
class easyCommReplyTemplateCreateProcessor extends modObjectCreateProcessor {
	public $objectType = 'ecReplyTemplate';
	public $classKey = 'ecReplyTemplate';
	public $languageTopics = array('easycomm');
	//public $permission = 'create';


	/**
	 * @return bool
	 */
	public function beforeSet() {
        $text = trim($this->getProperty('text'));
		if (empty($text)) {
			$this->modx->error->addField('text', $this->modx->lexicon('ec_reply_template_err_text'));
		}

        $preview = ecReplyTemplate::getTextPreview($text);
        $this->setProperty('preview', $preview);

		return parent::beforeSet();
	}

}

return 'easyCommReplyTemplateCreateProcessor';