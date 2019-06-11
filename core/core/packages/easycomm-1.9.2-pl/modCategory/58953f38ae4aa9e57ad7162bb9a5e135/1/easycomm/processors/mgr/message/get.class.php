<?php

/**
 * Get an ecMessage
 */
class easyCommMessageGetProcessor extends modObjectGetProcessor {
	public $objectType = 'ecMessage';
	public $classKey = 'ecMessage';
	public $languageTopics = array('easycomm:default');
	//public $permission = 'view';

    public function beforeOutput() {
        parent::beforeOutput();

        $dateFields = array('createdon', 'editedon', 'publishedon', 'deletedon');
        foreach($dateFields as $dateField){
            $v = $this->object->get($dateField);
            if(empty($v)) {
                $v = '-';
            }
            $this->object->set($dateField.'_visual', $v);
        }

        $userFields = array('createdby', 'editedby', 'publishedby', 'deletedby');
        foreach($userFields as $userField){
            $v = $this->object->get($userField);
            if(empty($v)) {
                $v = '-';
            }
            else {
                $user = $this->modx->getObject('modUser', $v);
                if($user) {
                    $v = '<a target="_blank" href="?a=security/user/update&id='.$v.'">'.$user->get('username').'</a> ('.$v.')';
                }
            }
            $this->object->set($userField.'_visual', $v);
        }

    }

}

return 'easyCommMessageGetProcessor';