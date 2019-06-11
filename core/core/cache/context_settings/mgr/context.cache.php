<?php  return array (
  'config' => 
  array (
    'allow_tags_in_post' => '1',
    'modRequest.class' => 'modManagerRequest',
  ),
  'aliasMap' => 
  array (
  ),
  'webLinkMap' => 
  array (
  ),
  'eventMap' => 
  array (
    'OnBeforeDocFormSave' => 
    array (
      14 => '14',
      6 => '6',
    ),
    'OnBeforeEmptyTrash' => 
    array (
      14 => '14',
      6 => '6',
    ),
    'OnChunkFormPrerender' => 
    array (
      5 => '5',
      1 => '1',
    ),
    'OnChunkFormSave' => 
    array (
      5 => '5',
    ),
    'OnDocFormPrerender' => 
    array (
      1 => '1',
      4 => '4',
      7 => '7',
      5 => '5',
      6 => '6',
    ),
    'OnDocFormRender' => 
    array (
      6 => '6',
      14 => '14',
      13 => '13',
    ),
    'OnDocFormSave' => 
    array (
      5 => '5',
    ),
    'OnFileCreateFormPrerender' => 
    array (
      1 => '1',
    ),
    'OnFileEditFormPrerender' => 
    array (
      1 => '1',
    ),
    'OnFileManagerUpload' => 
    array (
      4 => '4',
      9 => '9',
    ),
    'OnLoadWebDocument' => 
    array (
      14 => '14',
    ),
    'OnManagerPageBeforeRender' => 
    array (
      11 => '11',
      6 => '6',
      1 => '1',
      3 => '3',
    ),
    'OnManagerPageInit' => 
    array (
      6 => '6',
    ),
    'OnMODXInit' => 
    array (
      2 => '2',
      12 => '12',
      4 => '4',
    ),
    'OnPluginFormPrerender' => 
    array (
      1 => '1',
      5 => '5',
    ),
    'OnPluginFormSave' => 
    array (
      5 => '5',
    ),
    'OnResourceBeforeSort' => 
    array (
      6 => '6',
    ),
    'OnRichTextBrowserInit' => 
    array (
      11 => '11',
    ),
    'OnRichTextEditorInit' => 
    array (
      11 => '11',
    ),
    'OnRichTextEditorRegister' => 
    array (
      1 => '1',
      11 => '11',
    ),
    'OnSiteRefresh' => 
    array (
      2 => '2',
      12 => '12',
    ),
    'OnSnipFormPrerender' => 
    array (
      1 => '1',
      5 => '5',
    ),
    'OnSnipFormSave' => 
    array (
      5 => '5',
    ),
    'OnTempFormPrerender' => 
    array (
      5 => '5',
      1 => '1',
    ),
    'OnTempFormSave' => 
    array (
      5 => '5',
    ),
    'OnTVFormPrerender' => 
    array (
      5 => '5',
    ),
    'OnTVFormSave' => 
    array (
      5 => '5',
    ),
    'OnTVInputPropertiesList' => 
    array (
      7 => '7',
      4 => '4',
    ),
    'OnTVInputRenderList' => 
    array (
      4 => '4',
      7 => '7',
    ),
    'OnWebPagePrerender' => 
    array (
      2 => '2',
      12 => '12',
    ),
  ),
  'pluginCache' => 
  array (
    1 => 
    array (
      'id' => '1',
      'source' => '0',
      'property_preprocess' => '0',
      'name' => 'Ace',
      'description' => 'Ace code editor plugin for MODx Revolution',
      'editor_type' => '0',
      'category' => '0',
      'cache_type' => '0',
      'plugincode' => '/**
 * Ace Source Editor Plugin
 *
 * Events: OnManagerPageBeforeRender, OnRichTextEditorRegister, OnSnipFormPrerender,
 * OnTempFormPrerender, OnChunkFormPrerender, OnPluginFormPrerender,
 * OnFileCreateFormPrerender, OnFileEditFormPrerender, OnDocFormPrerender
 *
 * @author Danil Kostin <danya.postfactum(at)gmail.com>
 *
 * @package ace
 *
 * @var array $scriptProperties
 * @var Ace $ace
 */
if ($modx->event->name == \'OnRichTextEditorRegister\') {
    $modx->event->output(\'Ace\');
    return;
}

if ($modx->getOption(\'which_element_editor\', null, \'Ace\') !== \'Ace\') {
    return;
}

$ace = $modx->getService(\'ace\', \'Ace\', $modx->getOption(\'ace.core_path\', null, $modx->getOption(\'core_path\').\'components/ace/\').\'model/ace/\');
$ace->initialize();

$extensionMap = array(
    \'tpl\'   => \'text/x-smarty\',
    \'htm\'   => \'text/html\',
    \'html\'  => \'text/html\',
    \'css\'   => \'text/css\',
    \'scss\'  => \'text/x-scss\',
    \'less\'  => \'text/x-less\',
    \'svg\'   => \'image/svg+xml\',
    \'xml\'   => \'application/xml\',
    \'xsl\'   => \'application/xml\',
    \'js\'    => \'application/javascript\',
    \'json\'  => \'application/json\',
    \'php\'   => \'application/x-php\',
    \'sql\'   => \'text/x-sql\',
    \'md\'    => \'text/x-markdown\',
    \'txt\'   => \'text/plain\',
    \'twig\'  => \'text/x-twig\'
);

// Define default mime for html elements(templates, chunks and html resources)
$html_elements_mime=$modx->getOption(\'ace.html_elements_mime\',null,false);
if(!$html_elements_mime){
    // this may deprecated in future because components may set ace.html_elements_mime option now
    switch (true) {
        case $modx->getOption(\'twiggy_class\'):
            $html_elements_mime = \'text/x-twig\';
            break;
        case $modx->getOption(\'pdotools_fenom_parser\'):
            $html_elements_mime = \'text/x-smarty\';
            break;
        default:
            $html_elements_mime = \'text/html\';
    }
}

// Defines wether we should highlight modx tags
$modxTags = false;
switch ($modx->event->name) {
    case \'OnSnipFormPrerender\':
        $field = \'modx-snippet-snippet\';
        $mimeType = \'application/x-php\';
        break;
    case \'OnTempFormPrerender\':
        $field = \'modx-template-content\';
        $modxTags = true;
        $mimeType = $html_elements_mime;
        break;
    case \'OnChunkFormPrerender\':
        $field = \'modx-chunk-snippet\';
        if ($modx->controller->chunk && $modx->controller->chunk->isStatic()) {
            $extension = pathinfo($modx->controller->chunk->name, PATHINFO_EXTENSION);
            if(!$extension||!isset($extensionMap[$extension])){
                $extension = pathinfo($modx->controller->chunk->getSourceFile(), PATHINFO_EXTENSION);
            }
            $mimeType = isset($extensionMap[$extension]) ? $extensionMap[$extension] : \'text/plain\';
        } else {
            $mimeType = $html_elements_mime;
        }
        $modxTags = true;
        break;
    case \'OnPluginFormPrerender\':
        $field = \'modx-plugin-plugincode\';
        $mimeType = \'application/x-php\';
        break;
    case \'OnFileCreateFormPrerender\':
        $field = \'modx-file-content\';
        $mimeType = \'text/plain\';
        break;
    case \'OnFileEditFormPrerender\':
        $field = \'modx-file-content\';
        $extension = pathinfo($scriptProperties[\'file\'], PATHINFO_EXTENSION);
        $mimeType = isset($extensionMap[$extension])
            ? $extensionMap[$extension]
            : \'text/plain\';
        $modxTags = $extension == \'tpl\';
        break;
    case \'OnDocFormPrerender\':
        if (!$modx->controller->resourceArray) {
            return;
        }
        $field = \'ta\';
        $mimeType = $modx->getObject(\'modContentType\', $modx->controller->resourceArray[\'content_type\'])->get(\'mime_type\');

        if($mimeType == \'text/html\')$mimeType = $html_elements_mime;

        if ($modx->getOption(\'use_editor\')){
            $richText = $modx->controller->resourceArray[\'richtext\'];
            $classKey = $modx->controller->resourceArray[\'class_key\'];
            if ($richText || in_array($classKey, array(\'modStaticResource\',\'modSymLink\',\'modWebLink\',\'modXMLRPCResource\'))) {
                $field = false;
            }
        }
        $modxTags = true;
        break;
    default:
        return;
}

$modxTags = (int) $modxTags;
$script = \'\';
if ($field) {
    $script .= "MODx.ux.Ace.replaceComponent(\'$field\', \'$mimeType\', $modxTags);";
}

if ($modx->event->name == \'OnDocFormPrerender\' && !$modx->getOption(\'use_editor\')) {
    $script .= "MODx.ux.Ace.replaceTextAreas(Ext.query(\'.modx-richtext\'));";
}

if ($script) {
    $modx->controller->addHtml(\'<script>Ext.onReady(function() {\' . $script . \'});</script>\');
}',
      'locked' => '0',
      'properties' => NULL,
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => 'ace/elements/plugins/ace.plugin.php',
    ),
    2 => 
    array (
      'id' => '2',
      'source' => '1',
      'property_preprocess' => '0',
      'name' => 'pdoTools',
      'description' => '',
      'editor_type' => '0',
      'category' => '1',
      'cache_type' => '0',
      'plugincode' => '/** @var modX $modx */
switch ($modx->event->name) {

    case \'OnMODXInit\':
        $fqn = $modx->getOption(\'pdoTools.class\', null, \'pdotools.pdotools\', true);
        $path = $modx->getOption(\'pdotools_class_path\', null, MODX_CORE_PATH . \'components/pdotools/model/\', true);
        $modx->loadClass($fqn, $path, false, true);

        $fqn = $modx->getOption(\'pdoFetch.class\', null, \'pdotools.pdofetch\', true);
        $path = $modx->getOption(\'pdofetch_class_path\', null, MODX_CORE_PATH . \'components/pdotools/model/\', true);
        $modx->loadClass($fqn, $path, false, true);
        break;

    case \'OnSiteRefresh\':
        /** @var pdoTools $pdoTools */
        if ($pdoTools = $modx->getService(\'pdoTools\')) {
            if ($pdoTools->clearFileCache()) {
                $modx->log(modX::LOG_LEVEL_INFO, $modx->lexicon(\'refresh_default\') . \': pdoTools\');
            }
        }
        break;

    case \'OnWebPagePrerender\':
        $parser = $modx->getParser();
        if ($parser instanceof pdoParser) {
            foreach ($parser->pdoTools->ignores as $key => $val) {
                $modx->resource->_output = str_replace($key, $val, $modx->resource->_output);
            }
        }
        break;
}',
      'locked' => '0',
      'properties' => NULL,
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => 'core/components/pdotools/elements/plugins/plugin.pdotools.php',
    ),
    3 => 
    array (
      'id' => '3',
      'source' => '0',
      'property_preprocess' => '0',
      'name' => 'FormIt',
      'description' => '',
      'editor_type' => '0',
      'category' => '2',
      'cache_type' => '0',
      'plugincode' => '/**
 * FormIt
 *
 * Copyright 2009-2017 by Sterc <modx@sterc.nl>
 *
 * FormIt is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * FormIt is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * FormIt; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package formit
 */
/**
 * FormIt plugin
 *
 * @package formit
 */

$formit = $modx->getService(
    \'formit\',
    \'FormIt\',
    $modx->getOption(\'formit.core_path\', null, $modx->getOption(\'core_path\').\'components/formit/\') .\'model/formit/\',
    array()
);

if (!($formit instanceof FormIt)) {
    return;
}

switch ($modx->event->name) {
    case \'OnManagerPageBeforeRender\':
        // If migration status is false, show migrate alert message bar in manager
        if (method_exists(\'FormIt\',\'encryptionMigrationStatus\')) {
            if (!$formit->encryptionMigrationStatus()) {
                $modx->lexicon->load(\'formit:mgr\');
                $properties = array(\'message\' => $modx->lexicon(\'formit.migrate_alert\'));
                $chunk = $formit->_getTplChunk(\'migrate/alert\');
                if ($chunk) {
                    $modx->regClientStartupHTMLBlock($chunk->process($properties));
                    $modx->regClientCSS($formit->config[\'cssUrl\'] . \'migrate.css\');
                }
            }
        }
}',
      'locked' => '0',
      'properties' => 'a:0:{}',
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => '',
    ),
    4 => 
    array (
      'id' => '4',
      'source' => '0',
      'property_preprocess' => '0',
      'name' => 'FastUploadTV',
      'description' => 'FastUploadTV 1.0.0-pl plugin for MODx Revolution',
      'editor_type' => '0',
      'category' => '0',
      'cache_type' => '0',
      'plugincode' => '$corePath = $modx->getOption(\'core_path\',null,MODX_CORE_PATH).\'components/fastuploadtv/\';
$assetsUrl = $modx->getOption(\'assets_url\',null,MODX_ASSETS_URL).\'components/fastuploadtv/\';

$modx->lexicon->load(\'fastuploadtv:default\');

switch ($modx->event->name) {
    case \'OnTVInputRenderList\':
        $modx->event->output($corePath.\'elements/tv/input/\');
        break;
    case \'OnTVInputPropertiesList\':
        $modx->event->output($corePath.\'elements/tv/input/options/\');
        break;
    case \'OnDocFormPrerender\':
        $js  = $modx->getOption(\'assets_url\').\'components/fastuploadtv/mgr/js/\';
        $modx->regClientStartupScript($js.\'widgets/modx.form.filefield.js\');
        $modx->regClientStartupScript($js.\'FastUploadTV.js\');
        $modx->regClientStartupScript($js.\'FastUploadTV.form.FastUploadTVField.js\');
        break;
    case \'OnMODXInit\':
        $mTypes = $modx->getOption(\'manipulatable_url_tv_output_types\',null,\'image,file\').\',fastuploadtv\';
        $modx->setOption(\'manipulatable_url_tv_output_types\', $mTypes);
        break;
    case \'OnFileManagerUpload\':
        if ((bool)$modx->getOption(\'fastuploadtv.translit\', null, false))
        {
            $fat = $modx->getOption(\'friendly_alias_translit\');
            $friendly_alias_translit = (empty($fat) || $fat == \'none\') ? false : true;
            
            foreach($files as $file)
            {
                if($file[\'error\'] == 0)
                {
                    $pathInfo = pathinfo($file[\'name\']);
                    $oldPath = $directory.$file[\'name\'];
                    
                    $filename = modResource::filterPathSegment($modx, $pathInfo[\'filename\']); // cleanAlias (translate)
                    if ($friendly_alias_translit)
                    {
                        $filename = preg_replace(\'/[^A-Za-z0-9_-]/\', \'\', $filename); // restrict segment to alphanumeric characters only
                    }
                    $filename = preg_replace(\'/-{2,}/\',\'-\',$filename); // remove double symbol "-"
                    $filename = trim($filename, \'-\'); // remove first symbol "-"
                    
                    $newPath = $filename . \'.\' . strtolower($pathInfo[\'extension\']);
                    
                    $source->renameObject($oldPath, $newPath);
                }
            }
        }
        break;
}',
      'locked' => '0',
      'properties' => NULL,
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => '',
    ),
    5 => 
    array (
      'id' => '5',
      'source' => '0',
      'property_preprocess' => '0',
      'name' => 'VersionX',
      'description' => 'The plugin that enables VersionX of tracking your content.',
      'editor_type' => '0',
      'category' => '0',
      'cache_type' => '0',
      'plugincode' => '$corePath = $modx->getOption(\'versionx.core_path\',null,$modx->getOption(\'core_path\').\'components/versionx/\');
require_once $corePath.\'model/versionx.class.php\';
$modx->versionx = new VersionX($modx);

include $corePath . \'elements/plugins/versionx.plugin.php\';
return;',
      'locked' => '0',
      'properties' => NULL,
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => '',
    ),
    6 => 
    array (
      'id' => '6',
      'source' => '0',
      'property_preprocess' => '0',
      'name' => 'Collections',
      'description' => '',
      'editor_type' => '0',
      'category' => '5',
      'cache_type' => '0',
      'plugincode' => '/**
 * Collections
 *
 * DESCRIPTION
 *
 * This plugin inject JS to handle proper working of close buttons in Resource\'s panel (OnDocFormPrerender)
 * This plugin handles setting proper show_in_tree parameter (OnBeforeDocFormSave, OnResourceSort)
 *
 * @var modX $modx
 * @var array $scriptProperties
 */
$corePath = $modx->getOption(\'collections.core_path\', null, $modx->getOption(\'core_path\', null, MODX_CORE_PATH) . \'components/collections/\');
/** @var Collections $collections */
$collections = $modx->getService(
    \'collections\',
    \'Collections\',
    $corePath . \'model/collections/\',
    array(
        \'core_path\' => $corePath
    )
);

$className = \'Collections\' . $modx->event->name;

$modx->loadClass(\'CollectionsPlugin\', $collections->getOption(\'modelPath\') . \'collections/events/\', true, true);
$modx->loadClass($className, $collections->getOption(\'modelPath\') . \'collections/events/\', true, true);

if (class_exists($className)) {
    /** @var CollectionsPlugin $handler */
    $handler = new $className($modx, $scriptProperties);
    $handler->run();
}

return;',
      'locked' => '0',
      'properties' => 'a:0:{}',
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => '',
    ),
    7 => 
    array (
      'id' => '7',
      'source' => '0',
      'property_preprocess' => '0',
      'name' => 'MIGX',
      'description' => '',
      'editor_type' => '0',
      'category' => '6',
      'cache_type' => '0',
      'plugincode' => '$corePath = $modx->getOption(\'migx.core_path\',null,$modx->getOption(\'core_path\').\'components/migx/\');
$assetsUrl = $modx->getOption(\'migx.assets_url\', null, $modx->getOption(\'assets_url\') . \'components/migx/\');
switch ($modx->event->name) {
    case \'OnTVInputRenderList\':
        $modx->event->output($corePath.\'elements/tv/input/\');
        break;
    case \'OnTVInputPropertiesList\':
        $modx->event->output($corePath.\'elements/tv/inputoptions/\');
        break;

        case \'OnDocFormPrerender\':
        $modx->controller->addCss($assetsUrl.\'css/mgr.css\');
        break; 
 
    /*          
    case \'OnTVOutputRenderList\':
        $modx->event->output($corePath.\'elements/tv/output/\');
        break;
    case \'OnTVOutputRenderPropertiesList\':
        $modx->event->output($corePath.\'elements/tv/properties/\');
        break;
    
    case \'OnDocFormPrerender\':
        $assetsUrl = $modx->getOption(\'colorpicker.assets_url\',null,$modx->getOption(\'assets_url\').\'components/colorpicker/\'); 
        $modx->regClientStartupHTMLBlock(\'<script type="text/javascript">
        Ext.onReady(function() {
            
        });
        </script>\');
        $modx->regClientStartupScript($assetsUrl.\'sources/ColorPicker.js\');
        $modx->regClientStartupScript($assetsUrl.\'sources/ColorMenu.js\');
        $modx->regClientStartupScript($assetsUrl.\'sources/ColorPickerField.js\');		
        $modx->regClientCSS($assetsUrl.\'resources/css/colorpicker.css\');
        break;
     */
}
return;',
      'locked' => '0',
      'properties' => 'a:0:{}',
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => '',
    ),
    9 => 
    array (
      'id' => '9',
      'source' => '0',
      'property_preprocess' => '0',
      'name' => 'migxResizeOnUpload',
      'description' => '',
      'editor_type' => '0',
      'category' => '6',
      'cache_type' => '0',
      'plugincode' => '/**
 * migxResizeOnUpload Plugin
 *
 * Events: OnFileManagerUpload
 * Author: Bruno Perner <b.perner@gmx.de>
 * Modified to read multiple configs from mediasource-property
 * 
 * First Author: Vasiliy Naumkin <bezumkin@yandex.ru>
 * Required: PhpThumbOf snippet for resizing images
 * 
 * Example: mediasource - property \'resizeConfig\':
 * [{"alias":"origin","w":"500","h":"500","far":1},{"alias":"thumb","w":"150","h":"150","far":1}]
 */

if ($modx->event->name != \'OnFileManagerUpload\') {
    return;
}


$file = $modx->event->params[\'files\'][\'file\'];
$directory = $modx->event->params[\'directory\'];

if ($file[\'error\'] != 0) {
    return;
}

$name = $file[\'name\'];
//$extensions = explode(\',\', $modx->getOption(\'upload_images\'));

$source = $modx->event->params[\'source\'];

if ($source instanceof modMediaSource) {
    //$dirTree = $modx->getOption(\'dirtree\', $_REQUEST, \'\');
    //$modx->setPlaceholder(\'docid\', $resource_id);
    $source->initialize();
    $basePath = str_replace(\'/./\', \'/\', $source->getBasePath());
    //$cachepath = $cachepath . $dirTree;
    $baseUrl = $modx->getOption(\'site_url\') . $source->getBaseUrl();
    //$baseUrl = $baseUrl . $dirTree;
    $sourceProperties = $source->getPropertyList();

    //echo \'<pre>\' . print_r($sourceProperties, 1) . \'</pre>\';
    //$allowedExtensions = $modx->getOption(\'allowedFileTypes\', $sourceProperties, \'\');
    //$allowedExtensions = empty($allowedExtensions) ? \'jpg,jpeg,png,gif\' : $allowedExtensions;
    //$maxFilesizeMb = $modx->getOption(\'maxFilesizeMb\', $sourceProperties, \'8\');
    //$maxFiles = $modx->getOption(\'maxFiles\', $sourceProperties, \'0\');
    //$thumbX = $modx->getOption(\'thumbX\', $sourceProperties, \'100\');
    //$thumbY = $modx->getOption(\'thumbY\', $sourceProperties, \'100\');
    $resizeConfigs = $modx->getOption(\'resizeConfigs\', $sourceProperties, \'\');
    $resizeConfigs = $modx->fromJson($resizeConfigs);
    $thumbscontainer = $modx->getOption(\'thumbscontainer\', $sourceProperties, \'thumbs/\');
    $imageExtensions = $modx->getOption(\'imageExtensions\', $sourceProperties, \'jpg,jpeg,png,gif,JPG\');
    $imageExtensions = explode(\',\', $imageExtensions);
    //$uniqueFilenames = $modx->getOption(\'uniqueFilenames\', $sourceProperties, false);
    //$onImageUpload = $modx->getOption(\'onImageUpload\', $sourceProperties, \'\');
    //$onImageRemove = $modx->getOption(\'onImageRemove\', $sourceProperties, \'\');
    $cleanalias = $modx->getOption(\'cleanFilename\', $sourceProperties, false);

}

if (is_array($resizeConfigs) && count($resizeConfigs) > 0) {
    foreach ($resizeConfigs as $rc) {
        if (isset($rc[\'alias\'])) {
            $filePath = $basePath . $directory;
            $filePath = str_replace(\'//\',\'/\',$filePath);
            if ($rc[\'alias\'] == \'origin\') {
                $thumbPath = $filePath;
            } else {
                $thumbPath = $filePath . $rc[\'alias\'] . \'/\';
                $permissions = octdec(\'0\' . (int)($modx->getOption(\'new_folder_permissions\', null, \'755\', true)));
                if (!@mkdir($thumbPath, $permissions, true)) {
                    $modx->log(MODX_LOG_LEVEL_ERROR, sprintf(\'[migxResourceMediaPath]: could not create directory %s).\', $thumbPath));
                } else {
                    chmod($thumbPath, $permissions);
                }

            }


            $filename = $filePath . $name;
            $thumbname = $thumbPath . $name;
            $ext = substr(strrchr($name, \'.\'), 1);
            if (in_array($ext, $imageExtensions)) {
                $sizes = getimagesize($filename);
                echo $sizes[0]; 
                //$format = substr($sizes[\'mime\'], 6);
                if ($sizes[0] > $rc[\'w\'] || $sizes[1] > $rc[\'h\']) {
                    if ($sizes[0] < $rc[\'w\']) {
                        $rc[\'w\'] = $sizes[0];
                    }
                    if ($sizes[1] < $rc[\'h\']) {
                        $rc[\'h\'] = $sizes[1];
                    }
                    $type = $sizes[0] > $sizes[1] ? \'landscape\' : \'portrait\';
                    if (isset($rc[\'far\']) && $rc[\'far\'] == \'1\' && isset($rc[\'w\']) && isset($rc[\'h\'])) {
                        if ($type = \'landscape\') {
                            unset($rc[\'h\']);
                        }else {
                            unset($rc[\'w\']);
                        }
                    }

                    $options = \'\';
                    foreach ($rc as $k => $v) {
                        if ($k != \'alias\') {
                            $options .= \'&\' . $k . \'=\' . $v;
                        }
                    }
                    $resized = $modx->runSnippet(\'phpthumbof\', array(\'input\' => $filePath . $name, \'options\' => $options));
                    rename(MODX_BASE_PATH . substr($resized, 1), $thumbname);
                }
            }


        }
    }
}',
      'locked' => '0',
      'properties' => 'a:0:{}',
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => '',
    ),
    11 => 
    array (
      'id' => '11',
      'source' => '0',
      'property_preprocess' => '0',
      'name' => 'CKEditor',
      'description' => 'CKEditor WYSIWYG editor plugin for MODx Revolution',
      'editor_type' => '0',
      'category' => '0',
      'cache_type' => '0',
      'plugincode' => '',
      'locked' => '0',
      'properties' => NULL,
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '1',
      'static_file' => 'ckeditor/elements/plugins/ckeditor.plugin.php',
    ),
    12 => 
    array (
      'id' => '12',
      'source' => '1',
      'property_preprocess' => '0',
      'name' => 'MinifyX',
      'description' => '',
      'editor_type' => '0',
      'category' => '10',
      'cache_type' => '0',
      'plugincode' => 'switch ($modx->event->name) {
	case \'OnMODXInit\':
        $file = $modx->getOption(\'minifyx_core_path\', null, MODX_CORE_PATH) . \'components/minifyx/functions/function.php\';
        if (file_exists($file)) {
            include_once $file;
        }
		break;
	case \'OnSiteRefresh\':
        /** @var MinifyX $MinifyX */
		if ($MinifyX = $modx->getService(\'minifyx\',\'MinifyX\', MODX_CORE_PATH.\'components/minifyx/model/minifyx/\')) {
			if ($MinifyX->clearCache()) {
				$modx->log(modX::LOG_LEVEL_INFO, $modx->lexicon(\'refresh_default\').\': MinifyX\');
			}
		}
		break;
	case \'OnWebPagePrerender\':
		$time = microtime(true);
		// Process scripts and styles
		if ($modx->getOption(\'minifyx_process_registered\', null, false, true)) {
			$current = array(
				\'head\' => $modx->sjscripts,
				\'body\' => $modx->jscripts,
			);
			$included = $excluded = $prepared = $raw = array(
				\'head\' => array(\'css\' => array(), \'js\' => array(), \'html\' => array()),
				\'body\' => array(\'css\' => array(), \'js\' => array(), \'html\' => array()),
			);
			$exclude = $modx->getOption(\'minifyx_exclude_registered\');

			// Split all scripts and styles by type
			foreach ($current as $key => $value) {
				foreach ($value as $v) {
					if (preg_match(\'/<(?:link|script).*?(?:href|src)=[\\\'|"](.*?)[\\\'|"]/\', $v, $tmp)) {
						if (strpos($tmp[1], \'.css\') !== false) {
							if (!empty($exclude) && preg_match($exclude, $tmp[1])) {
								$excluded[$key][\'css\'][] = $tmp[1];
							}
							else {
								$included[$key][\'css\'][] = $tmp[1];
							}
						}
						if (strpos($tmp[1], \'.js\') !== false) {
							if (!empty($exclude) && preg_match($exclude, $tmp[1])) {
								$excluded[$key][\'js\'][] = $tmp[1];
							}
							else {
								$included[$key][\'js\'][] = $tmp[1];
							}
						}
					}
					elseif (strpos($v, \'<script\') !== false) {
						$raw[$key][\'js\'][] = trim(preg_replace(\'#<!--.*?-->(\\n|)#s\', \'\', $v));
					}
					elseif (strpos($v, \'<style\') !== false) {
						$raw[$key][\'css\'][] = trim(preg_replace(\'#/\\*.*?\\*/(\\n|)#s\', \'\', $v));
					}
					else {
						$excluded[$key][\'html\'][] = $v;
					}
				}
			}

			// Main options for MinifyX
			$scriptProperties = array(
				\'cacheFolder\' => $modx->getOption(\'minifyx_cacheFolder\', null, \'/assets/components/minifyx/cache/\', true),
				\'forceUpdate\' => $modx->getOption(\'minifyx_forceUpdate\', null, false, true),
				\'minifyJs\' => $modx->getOption(\'minifyx_minifyJs\', null, false, true),
				\'minifyCss\' => $modx->getOption(\'minifyx_minifyCss\', null, false, true),
				\'jsFilename\' => $modx->getOption(\'minifyx_jsFilename\', null, \'all\', true),
				\'cssFilename\' => $modx->getOption(\'minifyx_cssFilename\', null, \'all\', true),
			);
			/** @var MinifyX $MinifyX */
			if (isset($modx->minifyx) && $modx->minifyx instanceof MinifyX) {
                $MinifyX = $modx->minifyx;
                $MinifyX->reset($scriptProperties);
            } else {
                $MinifyX = $modx->getService(\'minifyx\', \'MinifyX\', MODX_CORE_PATH . \'components/minifyx/model/minifyx/\', $scriptProperties);
            }
			if (!$MinifyX->prepareCacheFolder()) {
				$this->modx->log(modX::LOG_LEVEL_ERROR, \'[MinifyX] Could not create cache dir "\'.$scriptProperties[\'cacheFolderPath\'].\'"\');
				return;
			}
			//$cacheFolderUrl = $MinifyX->config[\'cacheFolder\'];

			// Process raw scripts and styles
			$tmp_dir = $MinifyX->getTmpDir() . \'resources/\' . $modx->resource->id . \'/\';
			foreach ($raw as $key => $value) {
				foreach ($value as $type => $rows) {
					$tmp = \'\';
					if ($type == \'css\' && $modx->getOption(\'minifyx_processRawCss\', null, false, true) ||
						$type == \'js\' && $modx->getOption(\'minifyx_processRawJs\', null, false, true)) {

						$text = \'\';
						foreach ($rows as $text) {
							$text = preg_replace(\'#^<(script|style).*?>#\', \'\', $text);
							$text = preg_replace(\'#</(script|style)>$#\', \'\', $text);
							$tmp .= $text;
						}

						if (!empty($tmp)) {
							$file = sha1($tmp) . \'.\' . $type;
							if (!file_exists($tmp_dir . $file)) {
								if (!file_exists($tmp_dir)) {
									$MinifyX->makeDir($tmp_dir);
								}
								file_put_contents($tmp_dir . $file, $tmp);
							}
							$included[$key][$type][] = $tmp_dir . $file;
							$raw[$key][$type] = array();
						}
					}
				}
			}

			// Combine and minify files
			foreach ($included as $key => $value) {
				foreach ($value as $type => $files) {
					if (empty($files)) {continue;}
//					$filename = $MinifyX->config[$type.\'Filename\'] . \'_\';
//					$extension = $MinifyX->config[$type.\'Ext\'];
					$files = $MinifyX->prepareFiles($files, $type);
					$properties = array(
						\'minify\' => $MinifyX->config[\'minify\'.ucfirst($type)]
								? \'true\'
								: \'false\',
					);

					$result = $MinifyX->Munee($files, $properties);
					if ($MinifyX->saveFile($result)) {
                        $prepared[$key][$type][] = $MinifyX->getFileUrl();
                    }
				}
			}

			// Combine files by type
			$final = array(
				\'head\' => array_merge(
					$excluded[\'head\'][\'css\'], $prepared[\'head\'][\'css\'], $raw[\'head\'][\'css\'],
					$excluded[\'head\'][\'js\'], $prepared[\'head\'][\'js\'], $raw[\'head\'][\'js\']
				),
				\'body\' => array_merge(
					$excluded[\'body\'][\'css\'], $prepared[\'body\'][\'css\'], $raw[\'body\'][\'css\'],
					$excluded[\'body\'][\'js\'], $prepared[\'body\'][\'js\'], $raw[\'body\'][\'js\']
				),
			);

			// Push files to tags
			foreach ($final as $type => &$value) {
				foreach ($value as &$file) {
					if (strpos($file, \'<script\') === false && strpos($file, \'<style\') === false) {
						$file = preg_match(\'/\\.css$/iu\', $file)
							? \'<link rel="stylesheet" href="\' . $file . \'" type="text/css" />\'
							: \'<script type="text/javascript" src="\' . $file . \'"></script>\';
					}
				}
				if (!empty($excluded[$type][\'html\'])) {
					$value[] = implode("\\n", $excluded[$type][\'html\']);
				}
			}
			unset($value);

			// Replace tags in web page
			$modx->resource->_output = str_replace(
				array($modx->getRegisteredClientStartupScripts() . "\\n</head>", $modx->getRegisteredClientScripts() . "\\n</body>"),
				array(implode("\\n", $final[\'head\']) . "\\n</head>", implode("\\n", $final[\'body\']) . "\\n</body>"),
				$modx->resource->_output
			);
		}
		// Process images
		if ($modx->getOption(\'minifyx_process_images\', null, false, true)) {
			if (!$modx->getService(\'minifyx\',\'MinifyX\', MODX_CORE_PATH.\'components/minifyx/model/minifyx/\')) {return false;}

			$connector = $modx->getOption(\'minifyx_connector\', null, \'/assets/components/minifyx/munee.php\', true);
			$exclude = $modx->getOption(\'minifyx_exclude_images\');
			$replace = array(\'from\' => array(), \'to\' => array());
			$site_url = $modx->getOption(\'site_url\');
			$default = $modx->getOption(\'minifyx_images_filters\', null, \'\', true);

			preg_match_all(\'/<img.*?>/i\', $modx->resource->_output, $tags);
			foreach ($tags[0] as $tag) {
				if (preg_match($exclude, $tag)) {
					continue;
				}
				elseif (preg_match_all(\'/(src|height|width|filters)=[\\\'|"](.*?)[\\\'|"]/i\', $tag, $properties)) {
					if (count($properties[0]) >= 2) {
						$file = $connector . \'?files=\';
						$resize = \'\';
						$filters = \'\';
						$tmp = array(\'from\' => array(), \'to\' => array());

						foreach ($properties[1] as $k => $v) {
							if ($v == \'src\') {
								$src = $properties[2][$k];
								if (strpos($src, \'://\') !== false) {
									if (strpos($src, $site_url) !== false) {
										$src = str_replace($site_url, \'\', $src);
									}
									else {
										// Image from 3rd party domain
										continue;
									}
								}
								$file .= $src;
								$tmp[\'from\'][\'src\'] = $properties[2][$k];
							}
							elseif ($v == \'height\' || $v == \'width\') {
								$resize .=  $v[0] . \'[\'.$properties[2][$k].\']\';
							}
							elseif ($v == \'filters\') {
								$filters .= $properties[2][$k];
								$tmp[\'from\'][\'filters\'] = $properties[0][$k];
								$tmp[\'to\'][\'filters\'] = \'\';
							}
						}

						if (!empty($tmp[\'from\'][\'src\'])) {
							$resize .= isset($tmp[\'from\'][\'filters\'])
								? $filters
								: $default;
							$tmp[\'to\'][\'src\'] = $file . \'?resize=\' . $resize;

							ksort($tmp[\'from\']);
							ksort($tmp[\'to\']);

							$replace[\'from\'][] = $tag;
							$replace[\'to\'][] = str_replace($tmp[\'from\'], $tmp[\'to\'], $tag);
						}
					}
				}
			}

			if (!empty($replace)) {
				$modx->resource->_output = str_replace(
					$replace[\'from\'],
					$replace[\'to\'],
					$modx->resource->_output
				);
			}
		}
		// Minify the page content
        if ($modx->getOption(\'minifyx_minifyHtml\', null, false)) {
            $output = $modx->resource->_output;
            $replace = [
                \'/<!--[^\\[](.*?)[^\\]]-->/s\' => \'\',
                "/<\\?php/"                  => \'<?php \',
                "/\\n([\\S])/"                => \' $1\',
                "/\\n([\\S])/"                => \'$1\',
                "/>\\n</"                    => \'><\',
                "/>\\s+\\n</"                 => \'><\',
                "/>\\n\\s+</"                 => \'><\',
                "/\\r/"                      => \'\',
                "/\\n/"                      => \'\',
                "/\\t/"                      => \' \',
                \'/ +/\'                      => \' \',
                "/\\t/"                      => \'\',
                "/ +/"                      => \' \',
            ];
            $output = preg_replace(array_keys($replace), array_values($replace), $output);
            $modx->resource->_output = $output;
        }

		$modx->log(modX::LOG_LEVEL_INFO, \'[MinifyX] Total time for page "\'.$modx->resource->id.\'" = \'.(microtime(true) - $time));
		break;
}',
      'locked' => '0',
      'properties' => NULL,
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => 'core/components/minifyx/elements/plugins/plugin.minifyx.php',
    ),
    13 => 
    array (
      'id' => '13',
      'source' => '1',
      'property_preprocess' => '0',
      'name' => 'easyComm',
      'description' => '',
      'editor_type' => '0',
      'category' => '19',
      'cache_type' => '0',
      'plugincode' => '/** @var array $scriptProperties */
switch ($modx->event->name) {
    case \'OnDocFormRender\':
        /** @var modResource $resource */
        if ($mode == \'new\') {
            return;
        }

        $template = $resource->get(\'template\');
        $showTemplates = trim($modx->getOption(\'ec_show_templates\'));
        $showResources = trim($modx->getOption(\'ec_show_resources\'));
        $showTab = false;
        if($showTemplates == \'*\' || $showResources == \'*\') {
            $showTab = true;
        }
        else {
            $showTemplates = array_map(\'trim\', explode(\',\', $showTemplates));
            $showResources = array_map(\'trim\', explode(\',\', $showResources));
            if (in_array($template, $showTemplates) || in_array($resource->get(\'id\'), $showResources)) {
                $showTab = true;
            }
        }

        if(!$showTab) {
            return;
        }

        $modx23 = !empty($modx->version) && version_compare($modx->version[\'full_version\'], \'2.3.0\', \'>=\');
        $modx->controller->addHtml(\'<script type="text/javascript">
			Ext.onReady(function() {
				MODx.modx23 = \' . (int)$modx23 . \';
			});
		</script>\');


        /** @var easyComm $easyComm */
        $easyComm = $modx->getService(\'easyComm\', \'easyComm\', MODX_CORE_PATH.\'components/easycomm/model/easycomm/\');
        $modx->controller->addLexiconTopic(\'easycomm:default\');
        $url = $easyComm->config[\'assetsUrl\'];
        $modx->controller->addJavascript($url . \'js/mgr/easycomm.js\');

        $modx->controller->addLastJavascript($url . \'js/mgr/misc/utils.js\');
        $modx->controller->addLastJavascript($url . \'js/mgr/widgets/threads.grid.js\');
        $modx->controller->addLastJavascript($url . \'js/mgr/widgets/threads.windows.js\');
        $modx->controller->addLastJavascript($url . \'js/mgr/widgets/messages.grid.js\');
        $modx->controller->addLastJavascript($url . \'js/mgr/widgets/messages.windows.js\');
        $modx->controller->addLastJavascript($url . \'js/mgr/widgets/reply-templates.grid.js\');
        $modx->controller->addLastJavascript($url . \'js/mgr/widgets/reply-templates.windows.js\');
        $modx->controller->addLastJavascript($url . \'js/mgr/widgets/page.panel.js\');

        $modx->controller->addCss($url . \'css/mgr/main.css\');

        // TODO: разобраться, почему без этого не работает подключение плагинов
        $modx->newObject(\'ecMessage\');

        $pluginsJS = $easyComm->getPluginsJS();
        if(!empty($pluginsJS)){
            foreach($pluginsJS as $js) {
                $modx->controller->addJavascript($js);
            }
        }

        $defaultReplyAuthor = \'\';
        if($modx->getOption(\'ec_auto_reply_author\')) {
            $defaultReplyAuthor = addslashes($modx->user->getOne(\'Profile\')->get(\'fullname\'));
        }

        $defaultThread = $modx->getObject(\'ecThread\', array(\'name\' => \'resource-\'.$resource->get(\'id\')));
        $defaultThread = $defaultThread ? $defaultThread->get(\'id\') : \'null\';

        $ecConfig = \'
            easyComm.config.rating_visual_editor = \' . $modx->getOption(\'ec_rating_visual_editor\', null, true ) . \';
            easyComm.config.thread_fields = \' . json_encode($easyComm->getThreadFields()) . \';
            easyComm.config.thread_grid_fields = \' . json_encode($easyComm->getThreadGridFields()) . \';
            easyComm.config.thread_window_fields = \' . json_encode($easyComm->getThreadWindowFields()) . \';
            easyComm.config.message_fields = \' . json_encode($easyComm->getMessageFields()) . \';
            easyComm.config.message_grid_fields = \' . json_encode($easyComm->getMessageGridFields()) . \';
            easyComm.config.message_window_layout = \' . $easyComm->getMessageWindowLayout() . \';
            easyComm.config.message_grid_filters = \' . $modx->getOption(\'ec_message_grid_filters\', null, \'""\', true) . \';
            easyComm.config.default_reply_author = "\' . $defaultReplyAuthor . \'";
            easyComm.config.use_reply_templates = \' . $modx->getOption(\'ec_use_reply_templates\', null, 0, true ) . \';
            easyComm.config.use_rte = \' . $modx->getOption(\'ec_use_rte\', null, 0,  true ) . \';
            easyComm.config.default_resource = \' . $resource->get(\'id\') . \';
            easyComm.config.default_thread = \' . $defaultThread . \';
            easyComm.config.default_rating = \' . $modx->getOption(\'ec_rating_default\', null, \'""\') . \';
        \';

        if ($modx->getCount(\'modPlugin\', array(\'name\' => \'AjaxManager\', \'disabled\' => false))) {
            $modx->controller->addHtml(\'
			<script type="text/javascript">
				easyComm.config = \' . $modx->toJSON($easyComm->config) . \';
				easyComm.config.connector_url = "\' . $easyComm->config[\'connectorUrl\'] . \'";
				\'.$ecConfig.\'
				Ext.onReady(function() {
					window.setTimeout(function() {
						var tabs = Ext.getCmp("modx-resource-tabs");
						if (tabs) {
							tabs.add({
								xtype: "ec-panel-page",
								id: "ec-panel-page",
								title: _("ec"),
								record: {
									id: \' . $resource->get(\'id\') . \'
								}
							});
						}
					}, 10);
				});
			</script>\');
        }
        else {
            $modx->controller->addHtml(\'
			<script type="text/javascript">
				easyComm.config = \' . $modx->toJSON($easyComm->config) . \';
				easyComm.config.connector_url = "\' . $easyComm->config[\'connectorUrl\'] . \'";
				\'.$ecConfig.\'
				Ext.ComponentMgr.onAvailable("modx-resource-tabs", function() {
					this.on("beforerender", function() {
						this.add({
							xtype: "ec-panel-page",
							id: "ec-panel-page",
							title: _("ec"),
							record: {
								id: \' . $resource->get(\'id\') . \'
							}
						});
					});
					Ext.apply(this, {
							stateful: true,
							stateId: "modx-resource-tabs-state",
							stateEvents: ["tabchange"],
							getState: function() {return {activeTab:this.items.indexOf(this.getActiveTab())};
						}
					});
				});
			</script>\');
        }

        break;
}',
      'locked' => '0',
      'properties' => NULL,
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => 'core/components/easycomm/elements/plugins/plugin.easycomm.php',
    ),
    14 => 
    array (
      'id' => '14',
      'source' => '1',
      'property_preprocess' => '0',
      'name' => 'ms2Gallery',
      'description' => 'Main plugin for ms2Gallery',
      'editor_type' => '0',
      'category' => '20',
      'cache_type' => '0',
      'plugincode' => '/** @var array $scriptProperties */
switch ($modx->event->name) {

	case \'OnDocFormRender\':
		/** @var modResource $resource */
		if ($mode == \'new\' || ($resource->class_key == \'msProduct\' && $modx->getOption(\'ms2gallery_disable_for_ms2\', null, true))) {
			return;
		}
		$template = $resource->get(\'template\');
		$templates = array_map(\'trim\', explode(\',\', $modx->getOption(\'ms2gallery_disable_for_templates\')));
		if ($templates[0] != \'\' && in_array($template, $templates)) {
			return;
		}

		/** @var ms2Gallery $ms2Gallery */
		if ($ms2Gallery = $modx->getService(\'ms2gallery\', \'ms2Gallery\', MODX_CORE_PATH . \'components/ms2gallery/model/ms2gallery/\')) {
			$ms2Gallery->loadManagerFiles($modx->controller, $resource);
		}
		break;


	case \'OnBeforeDocFormSave\':
		if ($source_id = $resource->get(\'media_source\')) {
			$resource->setProperties(array(\'media_source\' => $source_id), \'ms2gallery\');
		}
		break;


	case \'OnLoadWebDocument\':
		$tstart = microtime(true);
		/** @var pdoFetch $pdoFetch */
		if (!$modx->getOption(\'ms2gallery_set_placeholders\', null, false, true) || !$pdoFetch = $modx->getService(\'pdoFetch\')) {
			return;
		}
		$plTemplates = array_map(\'trim\', explode(\',\', $modx->getOption(\'ms2gallery_placeholders_for_templates\')));
		if (!empty($plTemplates[0]) && !in_array($modx->resource->get(\'template\'), $plTemplates)) {
			return;
		}
		$plPrefix = $modx->getOption(\'ms2gallery_placeholders_prefix\', null, \'ms2g.\', true);
		$plThumbs = array_map(\'trim\', explode(\',\', $modx->getOption(\'ms2gallery_placeholders_thumbs\')));
		$tplName = $modx->getOption(\'ms2gallery_placeholders_tpl\');

		// Check for assigned TV
		$q = $modx->newQuery(\'modTemplateVarTemplate\');
		$q->innerJoin(\'modTemplateVar\', \'TemplateVar\');
		$q->innerJoin(\'modTemplate\', \'Template\');
		$q->where(array(
			\'TemplateVar.name\' => $tplName,
			\'Template.id\' => $modx->resource->get(\'template\')
		));
		$q->select(\'TemplateVar.id\');

		$tpl = \'\';
		if ($modx->getCount(\'modTemplateVarTemplate\', $q)) {
			$tpl = $modx->resource->getTVValue($tplName);
		}
		/** @var modChunk $chunk */
		if (empty($tpl) && $chunk = $modx->getObject(\'modChunk\', array(\'name\' => $tplName))) {
			$tpl = $chunk->getContent();
		}

		$options = array(\'loadModels\' => \'ms2gallery\');
		$where = array(\'resource_id\' => $modx->resource->id, \'parent\' => 0);

		$parents = $pdoFetch->getCollection(\'msResourceFile\', $where, $options);
		$options[\'select\'] = \'url\';
		foreach ($parents as &$parent) {
			$where = array(\'parent\' => $parent[\'id\']);
			if (!empty($plThumbs[0])) {
				$where[\'path:IN\'] = array();
				foreach ($plThumbs as $thumb) {
					$where[\'path:IN\'][] = $parent[\'path\'] . $thumb . \'/\';
				}
			}
			if ($children = $pdoFetch->getCollection(\'msResourceFile\', $where, $options)) {
				foreach ($children as $child) {
					if (preg_match(\'/((?:\\d{1,4}|)x(?:\\d{1,4}|))/\', $child[\'url\'], $size)) {
						$parent[$size[0]] = $child[\'url\'];
					}
				}
			}
			$pls = $pdoFetch->makePlaceholders($parent, $plPrefix . $parent[\'rank\'] . \'.\', \'[[+\', \']]\', false);
			$pls[\'vl\'][$plPrefix . $parent[\'rank\']] = !empty($tpl)
				? $pdoFetch->getChunk(\'@INLINE \' . $tpl, $parent)
				: htmlentities(print_r($parent, 1), ENT_QUOTES, \'UTF-8\');
			$modx->setPlaceholders($pls[\'vl\']);
		}

		$modx->log(modX::LOG_LEVEL_INFO, \'[ms2Gallery] Set image placeholders for page id = \' . $modx->resource->id . \' in \' . number_format(microtime(true) - $tstart, 7) . \' sec.\');
		break;


	case \'OnBeforeEmptyTrash\':
		if (empty($scriptProperties[\'ids\']) || !is_array($scriptProperties[\'ids\'])) {
			return;
		}
		if (!$modx->addPackage(\'ms2gallery\', MODX_CORE_PATH . \'components/ms2gallery/model/\')) {
			return;
		}
		$resources = $modx->getIterator(\'modResource\', array(\'id:IN\' => $scriptProperties[\'ids\']));
		/** @var modResource $resource */
		foreach ($resources as $resource) {
			$properties = $resource->getProperties(\'ms2gallery\');
			if (!empty($properties[\'media_source\'])) {
				/** @var modMediaSource $source */
				$source = $modx->getObject(\'modMediaSource\', $properties[\'media_source\']);
				$resource_id = $resource->get(\'id\');
				if ($source) {
					$source->set(\'ctx\', $resource->get(\'context_key\'));
					$source->initialize();
				}
				$images = $modx->getIterator(\'msResourceFile\', array(\'resource_id\' => $resource_id, \'parent\' => 0));
				/** @var msResourceFile $image */
				foreach ($images as $image) {
					$prepare = $image->prepareSource($source);
					if ($prepare === true) {
						$image->remove();
					}
					else {
						$modx->log(modX::LOG_LEVEL_ERROR, "[ms2Gallery] {$prepare}.");
					}
				}
				if ($source) {
					$source->removeContainer($source->getBasePath() . $resource_id);
				}
			}
		}
		break;

}',
      'locked' => '0',
      'properties' => NULL,
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => 'core/components/ms2gallery/elements/plugins/plugin.ms2gallery.php',
    ),
  ),
  'policies' => 
  array (
    'modAccessContext' => 
    array (
      'mgr' => 
      array (
        0 => 
        array (
          'principal' => 1,
          'authority' => 0,
          'policy' => 
          array (
            'about' => true,
            'access_permissions' => true,
            'actions' => true,
            'change_password' => true,
            'change_profile' => true,
            'charsets' => true,
            'class_map' => true,
            'components' => true,
            'content_types' => true,
            'countries' => true,
            'create' => true,
            'credits' => true,
            'customize_forms' => true,
            'dashboards' => true,
            'database' => true,
            'database_truncate' => true,
            'delete_category' => true,
            'delete_chunk' => true,
            'delete_context' => true,
            'delete_document' => true,
            'delete_eventlog' => true,
            'delete_plugin' => true,
            'delete_propertyset' => true,
            'delete_role' => true,
            'delete_snippet' => true,
            'delete_template' => true,
            'delete_tv' => true,
            'delete_user' => true,
            'directory_chmod' => true,
            'directory_create' => true,
            'directory_list' => true,
            'directory_remove' => true,
            'directory_update' => true,
            'edit_category' => true,
            'edit_chunk' => true,
            'edit_context' => true,
            'edit_document' => true,
            'edit_locked' => true,
            'edit_plugin' => true,
            'edit_propertyset' => true,
            'edit_role' => true,
            'edit_snippet' => true,
            'edit_template' => true,
            'edit_tv' => true,
            'edit_user' => true,
            'element_tree' => true,
            'empty_cache' => true,
            'error_log_erase' => true,
            'error_log_view' => true,
            'events' => true,
            'export_static' => true,
            'file_create' => true,
            'file_list' => true,
            'file_manager' => true,
            'file_remove' => true,
            'file_tree' => true,
            'file_update' => true,
            'file_upload' => true,
            'file_unpack' => true,
            'file_view' => true,
            'flush_sessions' => true,
            'frames' => true,
            'help' => true,
            'home' => true,
            'import_static' => true,
            'languages' => true,
            'lexicons' => true,
            'list' => true,
            'load' => true,
            'logout' => true,
            'logs' => true,
            'menus' => true,
            'menu_reports' => true,
            'menu_security' => true,
            'menu_site' => true,
            'menu_support' => true,
            'menu_system' => true,
            'menu_tools' => true,
            'menu_user' => true,
            'messages' => true,
            'namespaces' => true,
            'new_category' => true,
            'new_chunk' => true,
            'new_context' => true,
            'new_document' => true,
            'new_document_in_root' => true,
            'new_plugin' => true,
            'new_propertyset' => true,
            'new_role' => true,
            'new_snippet' => true,
            'new_static_resource' => true,
            'new_symlink' => true,
            'new_template' => true,
            'new_tv' => true,
            'new_user' => true,
            'new_weblink' => true,
            'packages' => true,
            'policy_delete' => true,
            'policy_edit' => true,
            'policy_new' => true,
            'policy_save' => true,
            'policy_template_delete' => true,
            'policy_template_edit' => true,
            'policy_template_new' => true,
            'policy_template_save' => true,
            'policy_template_view' => true,
            'policy_view' => true,
            'property_sets' => true,
            'providers' => true,
            'publish_document' => true,
            'purge_deleted' => true,
            'remove' => true,
            'remove_locks' => true,
            'resource_duplicate' => true,
            'resourcegroup_delete' => true,
            'resourcegroup_edit' => true,
            'resourcegroup_new' => true,
            'resourcegroup_resource_edit' => true,
            'resourcegroup_resource_list' => true,
            'resourcegroup_save' => true,
            'resourcegroup_view' => true,
            'resource_quick_create' => true,
            'resource_quick_update' => true,
            'resource_tree' => true,
            'save' => true,
            'save_category' => true,
            'save_chunk' => true,
            'save_context' => true,
            'save_document' => true,
            'save_plugin' => true,
            'save_propertyset' => true,
            'save_role' => true,
            'save_snippet' => true,
            'save_template' => true,
            'save_tv' => true,
            'save_user' => true,
            'search' => true,
            'set_sudo' => true,
            'settings' => true,
            'sources' => true,
            'source_delete' => true,
            'source_edit' => true,
            'source_save' => true,
            'source_view' => true,
            'steal_locks' => true,
            'tree_show_element_ids' => true,
            'tree_show_resource_ids' => true,
            'undelete_document' => true,
            'unlock_element_properties' => true,
            'unpublish_document' => true,
            'usergroup_delete' => true,
            'usergroup_edit' => true,
            'usergroup_new' => true,
            'usergroup_save' => true,
            'usergroup_user_edit' => true,
            'usergroup_user_list' => true,
            'usergroup_view' => true,
            'view' => true,
            'view_category' => true,
            'view_chunk' => true,
            'view_context' => true,
            'view_document' => true,
            'view_element' => true,
            'view_eventlog' => true,
            'view_offline' => true,
            'view_plugin' => true,
            'view_propertyset' => true,
            'view_role' => true,
            'view_snippet' => true,
            'view_sysinfo' => true,
            'view_template' => true,
            'view_tv' => true,
            'view_unpublished' => true,
            'view_user' => true,
            'workspaces' => true,
            'formit' => true,
            'formit_encryptions' => true,
          ),
        ),
      ),
    ),
  ),
);