<?php return array (
  '50cc253c0bf8bcfb5aa28b689e857624' => 
  array (
    'criteria' => 
    array (
      'name' => 'phpthumbon',
    ),
    'object' => 
    array (
      'name' => 'phpthumbon',
      'path' => '{core_path}components/phpthumbon/',
      'assets_path' => '',
    ),
  ),
  '1af60810ed657d65deb27fe7e946ea20' => 
  array (
    'criteria' => 
    array (
      'name' => 'phpthumbon',
    ),
    'object' => 
    array (
      'id' => 43,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'phpthumbon',
      'description' => 'Создание превьюх картинок',
      'editor_type' => 0,
      'category' => 0,
      'cache_type' => 0,
      'snippet' => '/**
 * phpThumbOn
 * Создание превьюх картинок
 *
 * Copyright 2013 by Agel_Nash <Agel_Nash@xaker.ru>
 *
 * @category images
 * @license GNU General Public License (GPL), http://www.gnu.org/copyleft/gpl.html
 * @author Agel_Nash <Agel_Nash@xaker.ru>
 */

if(empty($modx) || !($modx instanceof modX)) return \'\';

$componentPath = (string)$modx->getOption(\'phpthumbon.core_path\', null, $modx->getOption(\'core_path\').\'components/phpthumbon/\');

if(!isset($modx->phpThumbOn)){
    $modx->phpThumbOn = $modx->getService("phpthumbon","phpThumbOn",$componentPath.\'model/phpthumbon/\', $scriptProperties);
}

if(!($flag = ($modx->phpThumbOn instanceof phpThumbOn))){
    $modx->phpThumbOn = null;
}
return $flag ? $modx->phpThumbOn->run($scriptProperties) : $modx->getOption(\'phpthumbon.noimage\', $scriptProperties);',
      'locked' => 0,
      'properties' => 'a:2:{s:5:"input";a:7:{s:4:"name";s:5:"input";s:4:"desc";s:16:"phpthumbon.input";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:0:"";s:7:"lexicon";s:21:"phpthumbon:properties";s:4:"area";s:0:"";}s:7:"options";a:7:{s:4:"name";s:7:"options";s:4:"desc";s:17:"phpthumbon.folder";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:0:"";s:7:"lexicon";s:21:"phpthumbon:properties";s:4:"area";s:0:"";}}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '/**
 * phpThumbOn
 * Создание превьюх картинок
 *
 * Copyright 2013 by Agel_Nash <Agel_Nash@xaker.ru>
 *
 * @category images
 * @license GNU General Public License (GPL), http://www.gnu.org/copyleft/gpl.html
 * @author Agel_Nash <Agel_Nash@xaker.ru>
 */

if(empty($modx) || !($modx instanceof modX)) return \'\';

$componentPath = (string)$modx->getOption(\'phpthumbon.core_path\', null, $modx->getOption(\'core_path\').\'components/phpthumbon/\');

if(!isset($modx->phpThumbOn)){
    $modx->phpThumbOn = $modx->getService("phpthumbon","phpThumbOn",$componentPath.\'model/phpthumbon/\', $scriptProperties);
}

if(!($flag = ($modx->phpThumbOn instanceof phpThumbOn))){
    $modx->phpThumbOn = null;
}
return $flag ? $modx->phpThumbOn->run($scriptProperties) : $modx->getOption(\'phpthumbon.noimage\', $scriptProperties);',
    ),
  ),
  'b46ba928276a5ae465b0004c0a56ccf5' => 
  array (
    'criteria' => 
    array (
      'key' => 'phpthumbon.images_dir',
    ),
    'object' => 
    array (
      'key' => 'phpthumbon.images_dir',
      'value' => 'images',
      'xtype' => 'textfield',
      'namespace' => 'phpthumbon',
      'area' => 'paths',
      'editedon' => NULL,
    ),
  ),
  '88e1e670d0d638d37f1be9c84351333e' => 
  array (
    'criteria' => 
    array (
      'key' => 'phpthumbon.quality',
    ),
    'object' => 
    array (
      'key' => 'phpthumbon.quality',
      'value' => '96',
      'xtype' => 'numberfield',
      'namespace' => 'phpthumbon',
      'area' => 'general',
      'editedon' => NULL,
    ),
  ),
  'b487ddb872b7b07732c7f8d6c25f3ea5' => 
  array (
    'criteria' => 
    array (
      'key' => 'phpthumbon.cache_dir',
    ),
    'object' => 
    array (
      'key' => 'phpthumbon.cache_dir',
      'value' => 'cache_image',
      'xtype' => 'textfield',
      'namespace' => 'phpthumbon',
      'area' => 'path',
      'editedon' => NULL,
    ),
  ),
  '14bdb2d65e1bb970856037b3671be40d' => 
  array (
    'criteria' => 
    array (
      'key' => 'phpthumbon.ext',
    ),
    'object' => 
    array (
      'key' => 'phpthumbon.ext',
      'value' => 'jpeg',
      'xtype' => 'textfield',
      'namespace' => 'phpthumbon',
      'area' => 'general',
      'editedon' => NULL,
    ),
  ),
  '5af2db89295a5397238f1f245b30cf4d' => 
  array (
    'criteria' => 
    array (
      'key' => 'phpthumbon.noimage',
    ),
    'object' => 
    array (
      'key' => 'phpthumbon.noimage',
      'value' => '{assets_path}components/phpthumbon/noimage.jpg',
      'xtype' => 'textfield',
      'namespace' => 'phpthumbon',
      'area' => 'path',
      'editedon' => NULL,
    ),
  ),
  '29050136e509ec6837b27fb333e4de0a' => 
  array (
    'criteria' => 
    array (
      'key' => 'phpthumbon.queue',
    ),
    'object' => 
    array (
      'key' => 'phpthumbon.queue',
      'value' => '0',
      'xtype' => 'numberfield',
      'namespace' => 'phpthumbon',
      'area' => 'general',
      'editedon' => NULL,
    ),
  ),
  '8c6c8178f3241f949036d73509dc7019' => 
  array (
    'criteria' => 
    array (
      'key' => 'phpthumbon.error_mode',
    ),
    'object' => 
    array (
      'key' => 'phpthumbon.error_mode',
      'value' => '1',
      'xtype' => 'numberfield',
      'namespace' => 'phpthumbon',
      'area' => 'general',
      'editedon' => NULL,
    ),
  ),
  '9af43e2a57ce267ab739f7bd4a365d25' => 
  array (
    'criteria' => 
    array (
      'key' => 'phpthumbon.noimage_cache',
    ),
    'object' => 
    array (
      'key' => 'phpthumbon.noimage_cache',
      'value' => '{assets_path}components/phpthumbon/cache/',
      'xtype' => 'textfield',
      'namespace' => 'phpthumbon',
      'area' => 'path',
      'editedon' => NULL,
    ),
  ),
  '537ba427c7ade1accd29ea80f0391b08' => 
  array (
    'criteria' => 
    array (
      'key' => 'phpthumbon.make_cachename',
    ),
    'object' => 
    array (
      'key' => 'phpthumbon.make_cachename',
      'value' => '',
      'xtype' => 'textfield',
      'namespace' => 'phpthumbon',
      'area' => 'general',
      'editedon' => NULL,
    ),
  ),
);