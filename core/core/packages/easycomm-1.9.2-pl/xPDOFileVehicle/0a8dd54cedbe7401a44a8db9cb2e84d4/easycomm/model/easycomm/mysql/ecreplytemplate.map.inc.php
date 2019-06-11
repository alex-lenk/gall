<?php
$xpdo_meta_map['ecReplyTemplate']= array (
  'package' => 'easycomm',
  'version' => '1.1',
  'table' => 'ec_reply_templates',
  'extends' => 'xPDOSimpleObject',
  'tableMeta' => 
  array (
    'engine' => 'MyISAM',
  ),
  'fields' => 
  array (
    'text' => '',
    'preview' => '',
  ),
  'fieldMeta' => 
  array (
    'text' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'preview' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
  ),
);
