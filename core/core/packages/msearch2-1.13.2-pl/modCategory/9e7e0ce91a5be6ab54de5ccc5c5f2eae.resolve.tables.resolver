<?php
/**
 * Resolve creating db tables
 */
if ($object->xpdo) {
	switch ($options[xPDOTransport::PACKAGE_ACTION]) {
		case xPDOTransport::ACTION_INSTALL:
		case xPDOTransport::ACTION_UPGRADE:
			/* @var modX $modx */
			$modx =& $object->xpdo;
			$modelPath = $modx->getOption('msearch2.core_path',null,$modx->getOption('core_path').'components/msearch2/').'model/';
			$modx->addPackage('msearch2', $modelPath);
			$manager = $modx->getManager();

			$table = $modx->getTableName('mseWord');
			$q = $modx->prepare("SELECT `weight` FROM {$table} LIMIT 1;");
			$res = $q->execute();
			if ($q->errorCode() === '00000') {
				$manager->removeObjectContainer('mseWord');
				$manager->removeObjectContainer('mseIntro');
			}
			$manager->createObjectContainer('mseWord');
			$manager->createObjectContainer('mseIntro');
			$manager->createObjectContainer('mseQuery');
			$manager->createObjectContainer('mseAlias');
		break;
	}
}
return true;