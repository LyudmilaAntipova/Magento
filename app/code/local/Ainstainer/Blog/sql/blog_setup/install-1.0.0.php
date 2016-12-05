<?php

$installer = $this;
$installer->startSetup();

$table_post = $installer->getConnection()
    ->newTable('ain_blog_post')
    ->addColumn('post_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity' => true,
        'unsigned' => true,
        'nullable' => false,
        'primary' => true
    ))
    ->addColumn('title', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
        'nullable' => false
    ))
    ->addColumn('description', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
        'nullable' => false
    ))
    ->addColumn('content', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable' => false
    ))
    ->addColumn('post_status', Varien_Db_Ddl_Table::TYPE_BOOLEAN, null, array(
        'nullable'  =>  false,
        'default' => 0
    ))
    ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
    ));

$table_category = $installer->getConnection()
    ->newTable('ain_blog_category')
    ->addColumn('category_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity' => true,
        'unsigned' => true,
        'nullable' => false,
        'primary' => true
    ))
    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
        'nullable' => false
    ))
    ->addColumn('description', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable' => false
    ))
    ->addColumn('image', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
        'nullable' => false
    ));

$installer->getConnection()->createTable($table_post);
$installer->getConnection()->createTable($table_category);
$installer->endSetup();