<?php

/**
 * The home manager controller for mSearch2.
 *
 * @package msearch2
 */
class mSearch2HomeManagerController extends modExtraManagerController
{
    /* @var mSearch2 $mSearch2 */
    public $mSearch2;


    public function initialize()
    {
        if (!class_exists('mSearch2')) {
            require dirname(__DIR__) . '/model/msearch2/msearch2.class.php';
        }
        $this->mSearch2 = new mSearch2($this->modx);
        $this->addCSS($this->mSearch2->config['cssUrl'] . 'mgr/main.css');
        $this->addJavascript($this->mSearch2->config['jsUrl'] . 'mgr/msearch2.js');
        $this->addHtml('<script type="text/javascript">
			mSearch2.config = ' . $this->modx->toJSON($this->mSearch2->config) . ';
			mSearch2.config.connector_url = "' . $this->mSearch2->config['connectorUrl'] . '";
			Ext.onReady(function() {
				MODx.load({xtype: "msearch2-page-home"});
			});
		</script>');

        parent::initialize();
    }

    public function checkPermissions() {
        return true;
    }


    public function getLanguageTopics()
    {
        return array('msearch2:default');
    }


    public function getPageTitle()
    {
        return $this->modx->lexicon('msearch2');
    }


    public function loadCustomCssJs()
    {
        $this->addJavascript($this->mSearch2->config['jsUrl'] . 'mgr/widgets/index.form.js');
        $this->addJavascript($this->mSearch2->config['jsUrl'] . 'mgr/widgets/search.grid.js');
        $this->addJavascript($this->mSearch2->config['jsUrl'] . 'mgr/widgets/aliases.grid.js');
        $this->addJavascript($this->mSearch2->config['jsUrl'] . 'mgr/widgets/queries.grid.js');
        $this->addJavascript($this->mSearch2->config['jsUrl'] . 'mgr/widgets/dictionaries.grid.js');
        $this->addJavascript($this->mSearch2->config['jsUrl'] . 'mgr/widgets/home.panel.js');
        $this->addJavascript($this->mSearch2->config['jsUrl'] . 'mgr/sections/home.js');
    }


    public function getTemplateFile()
    {
        return $this->mSearch2->config['templatesPath'] . 'home.tpl';
    }
}