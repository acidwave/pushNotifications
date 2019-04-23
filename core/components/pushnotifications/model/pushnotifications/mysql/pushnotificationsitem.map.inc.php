<?php
$xpdo_meta_map['pushNotificationsItem']= array (
  'package' => 'pushnotifications',
  'version' => '1.1',
  'table' => 'push_subscription',
  'extends' => 'xPDOSimpleObject',
  'tableMeta' => 
  array (
    'engine' => 'InnoDB',
  ),
  'fields' => 
  array (
    'endpoint' => '',
    'publicKey' => '',
    'authToken' => '',
    'contentEncoding' => '',
  ),
  'fieldMeta' => 
  array (
    'endpoint' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'publicKey' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '100',
      'phptype' => 'string',
      'null' => true,
      'default' => '',
    ),
    'authToken' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '32',
      'phptype' => 'string',
      'null' => true,
      'default' => '',
    ),
    'contentEncoding' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '20',
      'phptype' => 'string',
      'null' => true,
      'default' => '',
    ),
  ),
  'indexes' => 
  array (
    'endpoint' => 
    array (
      'alias' => 'endpoint',
      'primary' => false,
      'unique' => true,
      'type' => 'BTREE',
      'columns' => 
      array (
        'endpoint' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
  ),
);
