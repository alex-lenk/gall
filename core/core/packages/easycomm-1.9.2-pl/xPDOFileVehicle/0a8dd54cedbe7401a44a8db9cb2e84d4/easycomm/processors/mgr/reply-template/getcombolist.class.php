<?php

/**
 * Get a list of ecReplyTemplates for combobox
 */
class easyCommReplyTemplateGetComboListProcessor extends modObjectGetListProcessor {
	public $objectType = 'ecReplyTemplate';
	public $classKey = 'ecReplyTemplate';
	public $defaultSortField = 'id';
	public $defaultSortDirection = 'DESC';
	//public $permission = 'list';

    /** @var ecMessage $message */
    private $message = null;
    /** @var array $messageData */
    private $messageData = array();

    /** @var pdoTools $pdoTools */
    private $pdoTools;


    /**
     * {@inheritDoc}
     * @return mixed
     */
    public function process() {
        $message = intval($this->getProperty('message'));
        if($message) {
            $this->message = $this->modx->getObject('ecMessage', $message);
            if($this->message) {
                $this->messageData = $this->message->toArray();
            }
        }

        $this->pdoTools = $this->modx->getService('pdoTools');

        return parent::process();
    }
    public function prepareQueryBeforeCount(xPDOQuery $c) {
        if ($this->getProperty('combo')) {
            $c->select('id, text, preview');
        }
        $query = $this->getProperty('query');
        if (!empty($query)) {
            $c->where(array(
                'text:LIKE' => '%'.$query.'%',
            ));
        }
        return $c;
    }
    /** {@inheritDoc} */
    public function prepareRow(xPDOObject $object) {
        if ($this->getProperty('combo')) {
            $array = $object->toArray();
        }
        else {
            $array = $object->toArray();
        }

        $array['text'] = $this->pdoTools->parseChunk('@INLINE '.$array['text'], $this->messageData);
        return $array;
    }

}

return 'easyCommReplyTemplateGetComboListProcessor';