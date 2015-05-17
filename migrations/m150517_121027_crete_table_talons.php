<?php

use yii\db\Schema;
use yii\db\Migration;

class m150517_121027_crete_table_talons extends Migration
{
    public function safeUp()
    {
      
        $this->createTable('{{%talon}}',[
            'id' => Schema::TYPE_PK,
            'date' => Schema::TYPE_DATE . ' NOT NULL',
            'type_repair' => Schema::TYPE_STRING . ' NOT NULL',
            'locksmith_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'material_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'desc' => Schema::TYPE_STRING, 
            'create_at' => Schema::TYPE_DATETIME . ' NOT NULL',
            'edit_at' => Schema::TYPE_DATETIME,
           ],
            null );
        $this->createIndex('date','{{%talon}}','date', false);
        $this->createIndex('type_repair','{{%talon}}','type_repair', false);
        $this->addForeignKey('locksmith_id', '{{%talon}}', 'locksmith_id',
         '{{%locksmith}}', 'id', $delete = null, $update = null);
        $this->addForeignKey('material_fk', '{{%talon}}', 'material_id',
         '{{%material}}', 'id', $delete = null, $update = null);
        return true;
    }
    
    public function safeDown()
    {
        echo "m150517_121027_crete_table_talons cannot be reverted.\n";
        $this->dropTable('{{%talon}}');
        return true;
    }
}
