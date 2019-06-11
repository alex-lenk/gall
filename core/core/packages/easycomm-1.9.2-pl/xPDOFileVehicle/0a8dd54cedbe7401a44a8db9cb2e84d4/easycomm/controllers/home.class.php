<?php

/**
 * The home manager controller for easyComm.
 *
 */
class easyCommHomeManagerController extends modExtraManagerController {
	/* @var easyComm $easyComm */
	public $easyComm;

    /**
     * @return void
     */
    public function initialize() {
        $corePath = $this->modx->getOption('easycomm_core_path', null, $this->modx->getOption('core_path') . 'components/easycomm/');
        require_once $corePath . 'model/easycomm/easycomm.class.php';

        $this->easyComm = new easyComm($this->modx);
        $this->addCss($this->easyComm->config['cssUrl'] . 'mgr/main.css');
        $this->addJavascript($this->easyComm->config['jsUrl'] . 'mgr/easycomm.js');

        $defaultReplyAuthor = '';
        if($this->modx->getOption('ec_auto_reply_author')) {
            $defaultReplyAuthor = addslashes($this->modx->user->getOne('Profile')->get('fullname'));
        }

        $this->addHtml('
		<script type="text/javascript">
			easyComm.config = ' . $this->modx->toJSON($this->easyComm->config) . ';
			easyComm.config.connector_url = "' . $this->easyComm->config['connectorUrl'] . '";
			easyComm.config.rating_visual_editor = ' . $this->modx->getOption('ec_rating_visual_editor', null, true ) . ';
			easyComm.config.thread_fields = ' . json_encode($this->easyComm->getThreadFields()) . ';
			easyComm.config.thread_grid_fields = ' . json_encode($this->easyComm->getThreadGridFields()) . ';
			easyComm.config.thread_window_fields = ' . json_encode($this->easyComm->getThreadWindowFields()) . ';
			easyComm.config.message_fields = ' . json_encode($this->easyComm->getMessageFields()) . ';
			easyComm.config.message_grid_fields = ' . json_encode($this->easyComm->getMessageGridFields()) . ';
			easyComm.config.message_window_layout = ' . $this->easyComm->getMessageWindowLayout() . ';
			easyComm.config.message_grid_filters = ' . $this->modx->getOption('ec_message_grid_filters', null, '""', true) . ';
			easyComm.config.default_reply_author = "' . $defaultReplyAuthor . '";
			easyComm.config.use_reply_templates = ' . $this->modx->getOption('ec_use_reply_templates', null, 0,  true ) . ';
			easyComm.config.use_rte = ' . $this->modx->getOption('ec_use_rte', null, 0,  true ) . ';
			easyComm.config.default_resource = null;
			easyComm.config.default_thread = null;
			easyComm.config.default_rating = ' . $this->modx->getOption('ec_rating_default', null, '""') . ';
		</script>
		');

        $pluginsJS = $this->easyComm->getPluginsJS();
        if(!empty($pluginsJS)){
            foreach($pluginsJS as $js) {
                $this->addJavascript($js);
            }
        }

        parent::initialize();
    }

    /**
     * @return array
     */
    public function getLanguageTopics() {
        return array('easycomm:default');
    }

    /**
     * @return bool
     */
    public function checkPermissions() {
        return true;
    }

	/**
	 * @param array $scriptProperties
	 */
	public function process(array $scriptProperties = array()) {
        if($this->modx->getOption('ec_use_rte')) {
            $this->loadRichTextEditor();
        }
	}


    public function loadRichTextEditor()
    {
        $useEditor = $this->modx->getOption('use_editor');
        $whichEditor = $this->modx->getOption('which_editor');
        if ($useEditor && !empty($whichEditor))
        {
            // invoke the OnRichTextEditorInit event
            $onRichTextEditorInit = $this->modx->invokeEvent('OnRichTextEditorInit', array(
                'editor' => $whichEditor, // Not necessary for Redactor
                'elements' => array('foo'), // Not necessary for Redactor
            ));
            /*if (is_array($onRichTextEditorInit))
            {
                $onRichTextEditorInit = implode('', $onRichTextEditorInit);
            }*/
            //$this->setPlaceholder('onRichTextEditorInit', $onRichTextEditorInit);
        }
    }

	/**
	 * @return null|string
	 */
	public function getPageTitle() {
		return $this->modx->lexicon('easycomm');
	}


	/**
	 * @return void
	 */
	public function loadCustomCssJs() {
		$this->addCss($this->easyComm->config['cssUrl'] . 'mgr/main.css');
		$this->addJavascript($this->easyComm->config['jsUrl'] . 'mgr/misc/utils.js');
		$this->addJavascript($this->easyComm->config['jsUrl'] . 'mgr/widgets/threads.grid.js');
		$this->addJavascript($this->easyComm->config['jsUrl'] . 'mgr/widgets/threads.windows.js');
        $this->addJavascript($this->easyComm->config['jsUrl'] . 'mgr/widgets/messages.grid.js');
        $this->addJavascript($this->easyComm->config['jsUrl'] . 'mgr/widgets/messages.windows.js');
        $this->addJavascript($this->easyComm->config['jsUrl'] . 'mgr/widgets/reply-templates.grid.js');
        $this->addJavascript($this->easyComm->config['jsUrl'] . 'mgr/widgets/reply-templates.windows.js');
		$this->addJavascript($this->easyComm->config['jsUrl'] . 'mgr/widgets/home.panel.js');
		$this->addJavascript($this->easyComm->config['jsUrl'] . 'mgr/sections/home.js');
		$this->addHtml('<script type="text/javascript">
		Ext.onReady(function() {
			MODx.load({ xtype: "ec-page-home"});
		});
		</script>');
	}


	/**
	 * @return string
	 */
	public function getTemplateFile() {
		return $this->easyComm->config['templatesPath'] . 'home.tpl';
	}
}