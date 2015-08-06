<?php

use yii\db\Schema;
use yii\db\Migration;

class m150601_112504_new_table extends Migration
{
    public function up()
    {
    	$this->createTable('job',[
    		'id' => Schema::TYPE_PK,
    		'code' => Schema::TYPE_STRING . '(15) NOT NULL',
    		'name' => Schema::TYPE_STRING . ' NOT NULL',
    		'unit' => Schema::TYPE_STRING . '(25) NOT NULL',
    		]
    		);
    	$this->createIndex('uq_job','job','code',true);

			$this->createTable('job_price',[
    		'id' => Schema::TYPE_PK,
    		'id_job' => Schema::TYPE_INTEGER . ' NOT NULL',
    		'date' => Schema::TYPE_DATE . ' NOT NULL',
    		'cost' => Schema::TYPE_MONEY . ' NOT NULL',
    		'price_notax' => Schema::TYPE_MONEY . ' NOT NULL',
    		'tax' => Schema::TYPE_MONEY . ' NOT NULL',
    		'price' => Schema::TYPE_MONEY . ' NOT NULL',
    		'labor_cost' => Schema::TYPE_FLOAT . ' NOT NULL',
    		]);
    	$this->createIndex('ix_price','job_price','price');
    	$this->createIndex('uq_price','job_price',['id_job','date'],true);		

    	$this->addForeignKey('fk_job', 'job_price', 'id_job',
         'job', 'id', $delete = null, $update = null);	
    }

    public function down()
    {
        echo "m150601_112504_new_table cannot be reverted.\n";

        return false;
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
