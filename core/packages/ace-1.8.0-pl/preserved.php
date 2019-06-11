<?php return array (
  'c827cfcdcee42788644e3a4d0aaa259b' => 
  array (
    'criteria' => 
    array (
      'name' => 'ace',
    ),
    'object' => 
    array (
      'name' => 'ace',
      'path' => '{core_path}components/ace/',
      'assets_path' => '',
    ),
  ),
  'e6928d5ac91d2b45d84b5a8c2e9c38d5' => 
  array (
    'criteria' => 
    array (
      'name' => 'Ace',
    ),
    'object' => 
    array (
      'id' => 10,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'Ace',
      'description' => 'Ace code editor plugin for MODx Revolution',
      'editor_type' => 0,
      'category' => 0,
      'cache_type' => 0,
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

        switch (true) {
            case $modx->getOption(\'twiggy_class\'):
                $mimeType = \'text/x-twig\';
                break;
            case $modx->getOption(\'pdotools_fenom_parser\'):
                $mimeType = \'text/x-smarty\';
                break;
            default:
                $mimeType = \'text/html\';
                break;
        }

        break;
    case \'OnChunkFormPrerender\':
        $field = \'modx-chunk-snippet\';
        if ($modx->controller->chunk && $modx->controller->chunk->isStatic()) {
            $extension = pathinfo($modx->controller->chunk->getSourceFile(), PATHINFO_EXTENSION);
            $mimeType = isset($extensionMap[$extension]) ? $extensionMap[$extension] : \'text/plain\';
        } else {
            $mimeType = \'text/html\';
        }
        $modxTags = true;

        switch (true) {
            case $modx->getOption(\'twiggy_class\'):
                $mimeType = \'text/x-twig\';
                break;
            case $modx->getOption(\'pdotools_fenom_default\'):
                $mimeType = \'text/x-smarty\';
                break;
            default:
                $mimeType = \'text/html\';
                break;
        }

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

        switch (true) {
            case $mimeType == \'text/html\' && $modx->getOption(\'twiggy_class\'):
                $mimeType = \'text/x-twig\';
                break;
            case $mimeType == \'text/html\' && $modx->getOption(\'pdotools_fenom_parser\'):
                $mimeType = \'text/x-smarty\';
                break;
        }

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
      'locked' => 0,
      'properties' => NULL,
      'disabled' => 0,
      'moduleguid' => '',
      'static' => 0,
      'static_file' => 'ace/elements/plugins/ace.plugin.php',
      'content' => '/**
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

        switch (true) {
            case $modx->getOption(\'twiggy_class\'):
                $mimeType = \'text/x-twig\';
                break;
            case $modx->getOption(\'pdotools_fenom_parser\'):
                $mimeType = \'text/x-smarty\';
                break;
            default:
                $mimeType = \'text/html\';
                break;
        }

        break;
    case \'OnChunkFormPrerender\':
        $field = \'modx-chunk-snippet\';
        if ($modx->controller->chunk && $modx->controller->chunk->isStatic()) {
            $extension = pathinfo($modx->controller->chunk->getSourceFile(), PATHINFO_EXTENSION);
            $mimeType = isset($extensionMap[$extension]) ? $extensionMap[$extension] : \'text/plain\';
        } else {
            $mimeType = \'text/html\';
        }
        $modxTags = true;

        switch (true) {
            case $modx->getOption(\'twiggy_class\'):
                $mimeType = \'text/x-twig\';
                break;
            case $modx->getOption(\'pdotools_fenom_default\'):
                $mimeType = \'text/x-smarty\';
                break;
            default:
                $mimeType = \'text/html\';
                break;
        }

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

        switch (true) {
            case $mimeType == \'text/html\' && $modx->getOption(\'twiggy_class\'):
                $mimeType = \'text/x-twig\';
                break;
            case $mimeType == \'text/html\' && $modx->getOption(\'pdotools_fenom_parser\'):
                $mimeType = \'text/x-smarty\';
                break;
        }

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
    ),
  ),
  '5c9117f3f9306309f3b7257399a7240d' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 10,
      'event' => 'OnChunkFormPrerender',
    ),
    'object' => 
    array (
      'pluginid' => 10,
      'event' => 'OnChunkFormPrerender',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  '7c13e16a515f5f604eb27e99177e239e' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 10,
      'event' => 'OnPluginFormPrerender',
    ),
    'object' => 
    array (
      'pluginid' => 10,
      'event' => 'OnPluginFormPrerender',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  'b03fec404d327fd246a4a2825b63eb09' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 10,
      'event' => 'OnSnipFormPrerender',
    ),
    'object' => 
    array (
      'pluginid' => 10,
      'event' => 'OnSnipFormPrerender',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  'c666dc4fa3000e3cf992f2851fe92e61' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 10,
      'event' => 'OnTempFormPrerender',
    ),
    'object' => 
    array (
      'pluginid' => 10,
      'event' => 'OnTempFormPrerender',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  '7afec938180940ebc633035c7e5b3803' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 10,
      'event' => 'OnFileEditFormPrerender',
    ),
    'object' => 
    array (
      'pluginid' => 10,
      'event' => 'OnFileEditFormPrerender',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  'dc728cd5e1dc89df8fab87f31cded771' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 10,
      'event' => 'OnFileCreateFormPrerender',
    ),
    'object' => 
    array (
      'pluginid' => 10,
      'event' => 'OnFileCreateFormPrerender',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  'cb963f3e8877ce33ab7ff2f74557e9c0' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 10,
      'event' => 'OnDocFormPrerender',
    ),
    'object' => 
    array (
      'pluginid' => 10,
      'event' => 'OnDocFormPrerender',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  '1150f1d6f7e98e2bc6f78038c3e482ea' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 10,
      'event' => 'OnRichTextEditorRegister',
    ),
    'object' => 
    array (
      'pluginid' => 10,
      'event' => 'OnRichTextEditorRegister',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  '54e156a19590fd651049eb44caab8a27' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 10,
      'event' => 'OnManagerPageBeforeRender',
    ),
    'object' => 
    array (
      'pluginid' => 10,
      'event' => 'OnManagerPageBeforeRender',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  'f2a8cc749346983f78d1716a4843a615' => 
  array (
    'criteria' => 
    array (
      'key' => 'ace.theme',
    ),
    'object' => 
    array (
      'key' => 'ace.theme',
      'value' => 'chrome',
      'xtype' => 'textfield',
      'namespace' => 'ace',
      'area' => 'general',
      'editedon' => NULL,
    ),
  ),
  '7e6624fefc5c95edc6446219a43f6a1a' => 
  array (
    'criteria' => 
    array (
      'key' => 'ace.font_size',
    ),
    'object' => 
    array (
      'key' => 'ace.font_size',
      'value' => '13px',
      'xtype' => 'textfield',
      'namespace' => 'ace',
      'area' => 'general',
      'editedon' => NULL,
    ),
  ),
  '059bfc2d6f982755f5cc0059a0f2a994' => 
  array (
    'criteria' => 
    array (
      'key' => 'ace.word_wrap',
    ),
    'object' => 
    array (
      'key' => 'ace.word_wrap',
      'value' => '',
      'xtype' => 'combo-boolean',
      'namespace' => 'ace',
      'area' => 'general',
      'editedon' => NULL,
    ),
  ),
  'f87ce470e103854f7c89ff2ff4803ec6' => 
  array (
    'criteria' => 
    array (
      'key' => 'ace.soft_tabs',
    ),
    'object' => 
    array (
      'key' => 'ace.soft_tabs',
      'value' => '1',
      'xtype' => 'combo-boolean',
      'namespace' => 'ace',
      'area' => 'general',
      'editedon' => NULL,
    ),
  ),
  'ed6e18d86100c10e94ba188dd66801b7' => 
  array (
    'criteria' => 
    array (
      'key' => 'ace.tab_size',
    ),
    'object' => 
    array (
      'key' => 'ace.tab_size',
      'value' => '4',
      'xtype' => 'textfield',
      'namespace' => 'ace',
      'area' => 'general',
      'editedon' => NULL,
    ),
  ),
  'e21516b833cc4bff5523fafc67e4f2f1' => 
  array (
    'criteria' => 
    array (
      'key' => 'ace.fold_widgets',
    ),
    'object' => 
    array (
      'key' => 'ace.fold_widgets',
      'value' => '1',
      'xtype' => 'combo-boolean',
      'namespace' => 'ace',
      'area' => 'general',
      'editedon' => NULL,
    ),
  ),
  '92fcd340b1eb01c538e76d631929eb6e' => 
  array (
    'criteria' => 
    array (
      'key' => 'ace.show_invisibles',
    ),
    'object' => 
    array (
      'key' => 'ace.show_invisibles',
      'value' => '0',
      'xtype' => 'combo-boolean',
      'namespace' => 'ace',
      'area' => 'general',
      'editedon' => NULL,
    ),
  ),
  'c6f6044ec17c70946bd05f100c300aa0' => 
  array (
    'criteria' => 
    array (
      'key' => 'ace.snippets',
    ),
    'object' => 
    array (
      'key' => 'ace.snippets',
      'value' => '',
      'xtype' => 'textarea',
      'namespace' => 'ace',
      'area' => 'general',
      'editedon' => NULL,
    ),
  ),
  'b6883d4e5563fd25cef8eb588a626b0c' => 
  array (
    'criteria' => 
    array (
      'key' => 'ace.height',
    ),
    'object' => 
    array (
      'key' => 'ace.height',
      'value' => '',
      'xtype' => 'textfield',
      'namespace' => 'ace',
      'area' => 'general',
      'editedon' => NULL,
    ),
  ),
);