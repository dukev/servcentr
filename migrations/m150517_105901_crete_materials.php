<?php

use yii\db\Schema;
use yii\db\Migration;

class m150517_105901_crete_materials extends Migration
{
    public function safeUp()
    {
    	$this->createTable('{{%material}}',[
    		'id' => Schema::TYPE_PK,
    		'articul' => Schema::TYPE_STRING . ' NOT NULL',
    		'name' => Schema::TYPE_STRING . ' NOT NULL',
    		'unit' => Schema::TYPE_STRING . ' NOT NULL',
    		'desc' => Schema::TYPE_STRING, 
    		'create_at' => Schema::TYPE_DATETIME . ' NOT NULL',
    		'edit_at' => Schema::TYPE_DATETIME ],
				null
				);
    	$this->createIndex('articul','{{%material}}','articul', false);
    	$this->createIndex('name','{{%material}}','name', false);
    	return true;
    }
    
    public function safeDown()
    {
    	echo "m150517_105901_crete_tables cannot be reverted.\n";
    	$this->dropTable('{{%material}}');
    	return true;
    }
    
}
