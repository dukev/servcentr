<?php

use yii\db\Schema;
use yii\db\Migration;

class m150601_115112_talon_job extends Migration
{
    public function up()
    {
        $this->createTable('equipment',[
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . '(25) NOT NULL']
            );
        $this->createTable('vendor',[
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL']
            );
        $this->createTable('vendor_model',[
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'id_vendor' => Schema::TYPE_INTEGER . ' NOT NULL']
            );
        
        
        $this->createTable('talon_job',[
            'id' => Schema::TYPE_PK,
            'id_talon' => Schema::TYPE_INTEGER . ' NOT NULL',
            'id_job' => Schema::TYPE_INTEGER . ' NOT NULL',
            'id_equipment' => Schema::TYPE_INTEGER . ' NOT NULL',
            'id_model' => Schema::TYPE_INTEGER . ' NOT NULL',
            'amount' => Schema::TYPE_INTEGER . ' NOT NULL']
            );

        $this->addForeignKey('fk_job_talon', 'talon_job', 'id_job',
         'job', 'id');  
        $this->addForeignKey('fk_equipment_talon', 'talon_job', 'id_equipment',
         'equipment', 'id');  
        $this->addForeignKey('fk_vendor_talon', 'talon_job', 'id_model',
         'vendor_model', 'id'); 
        $this->addForeignKey('fk_vendor_model', 'vendor_model', 'id_vendor',
         'vendor', 'id');
        $this->batchInsert('equipment',['name'],[['ПГ'],['ГК'],['ОП'],['ГУК'],
            ['Конвектор']]);
          

    }

    public function down()
    {
        echo "m150601_115112_talon_job cannot be reverted.\n";

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
