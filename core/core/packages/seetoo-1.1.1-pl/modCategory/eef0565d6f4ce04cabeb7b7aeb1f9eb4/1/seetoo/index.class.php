<?php

/**
 * Class SeeTooMainController
 */
abstract class SeeTooMainController extends modExtraManagerController {
	/** @var SeeToo $SeeToo */
	public $SeeToo;


	/**
	 * @return void
	 */
	public function initialize() {
		$corePath = $this->modx->getOption('seetoo_core_path', null, $this->modx->getOption('core_path') . 'components/seetoo/');
		require_once $corePath . 'model/seetoo/seetoo.class.php';

		$this->SeeToo = new SeeToo($this->modx);
		//$this->addCss($this->SeeToo->config['cssUrl'] . 'mgr/main.css');
		$this->addJavascript($this->SeeToo->config['jsUrl'] . 'mgr/seetoo.js');
		$this->addHtml('
		<script type="text/javascript">
			SeeToo.config = ' . $this->modx->toJSON($this->SeeToo->config) . ';
			SeeToo.config.connector_url = "' . $this->SeeToo->config['connectorUrl'] . '";
		</script>
		');

		parent::initialize();
	}


	/**
	 * @return array
	 */
	public function getLanguageTopics() {
		return array('SeeToo:default');
	}


	/**
	 * @return bool
	 */
	public function checkPermissions() {
		return true;
	}
}


/**
 * Class IndexManagerController
 */
class IndexManagerController extends SeeTooMainController {

	/**
	 * @return string
	 */
	public static function getDefaultController() {
		return 'home';
	}
}