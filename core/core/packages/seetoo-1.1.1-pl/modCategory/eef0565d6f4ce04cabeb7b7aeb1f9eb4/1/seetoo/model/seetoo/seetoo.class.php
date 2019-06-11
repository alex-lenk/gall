<?php

/**
 * The base class for SeeToo.
 */
class SeeToo {
	/* @var modX $modx */
	public $modx;

	public $excluder;

	/**
	 * @param modX $modx
	 * @param array $config
	 */
	function __construct(modX &$modx, array $config = array()) {
		$this->modx =& $modx;

		$corePath = $this->modx->getOption('seetoo_core_path', $config, $this->modx->getOption('core_path') . 'components/seetoo/');
		$assetsUrl = $this->modx->getOption('seetoo_assets_url', $config, $this->modx->getOption('assets_url') . 'components/seetoo/');
		$connectorUrl = $assetsUrl . 'connector.php';

		$this->config = array_merge(array(
			'assetsUrl' => $assetsUrl,
			'cssUrl' => $assetsUrl . 'css/',
			'jsUrl' => $assetsUrl . 'js/',
			'imagesUrl' => $assetsUrl . 'images/',
			'connectorUrl' => $connectorUrl,
			'customPath' => $corePath.'custom/',

			'corePath' => $corePath,
			'modelPath' => $corePath . 'model/',
			'chunksPath' => $corePath . 'elements/chunks/',
			'templatesPath' => $corePath . 'elements/templates/',
			'chunkSuffix' => '.chunk.tpl',
			'snippetsPath' => $corePath . 'elements/snippets/',
			'processorsPath' => $corePath . 'processors/'
		), $config);

		$this->modx->addPackage('seetoo', $this->config['modelPath']);
		$this->modx->lexicon->load('seetoo:default');

		$this->includeHelpers();
	}

	protected function includeHelpers()
	{
		require_once dirname(__FILE__) . '/seetooexcluder.class.php';
		$excluder_class = $this->modx->getOption('seetoo_excluder_class', null, 'SeeTooExcluder');
		if ($excluder_class != 'SeeTooExcluder') {$this->loadCustomClasses('excluder');}
		if (!class_exists($excluder_class)) {$excluder_class = 'SeeTooExcluder';}

		$this->excluder = new $excluder_class($this, $this->config);
		if (!($this->excluder instanceof seetooExcluderInterface)) {
			$this->modx->log(modX::LOG_LEVEL_ERROR, $excluder_class . ' must implement SeeTooExcluderInterface');
			return false;
		}
	}

	/**
	 * Method loads custom classes from specified directory
	 *
	 * @var string $dir Directory for load classes
	 *
	 * @return void
	 */
	public function loadCustomClasses($dir) {
		$files = scandir($this->config['customPath'] . $dir);
		foreach ($files as $file) {
			if (preg_match('/.*?\.class\.php$/i', $file)) {
				include_once($this->config['customPath'] . $dir . '/' . $file);
			}
		}
	}

}