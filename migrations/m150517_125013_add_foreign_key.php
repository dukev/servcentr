<?php

use yii\db\Schema;
use yii\db\Migration;

class m150517_125013_add_foreign_key extends Migration
{
    
        
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $this->alterColumn('movement','type', Schema::TYPE_INTEGER);
        $this->renameColumn('movement', 'type','type_id');
        $this->addForeignKey('fk_movement_type', '{{%movement}}', 'type_id',
         '{{%type_movement}}', 'id', $delete = null, $update = null);


        $this->alterColumn('talon','type_repair', Schema::TYPE_INTEGER);
        $this->renameColumn('talon', 'type_repair','type_repair_id');
        $this->addForeignKey('fk_repair_type', '{{%talon}}', 'type_repair_id',
         '{{%type_repair}}', 'id', $delete = null, $update = null);
    }
    
    public function safeDown()
    {
        echo "m150517_125013_add_foreign_key cannot be reverted.\n";
        $this->dropForeignKey('fk_movement_type', '{{%movement}}');
        $this->alterColumn('movement','type_id', Schema::TYPE_STRING);
        $this->renameColumn('movement', 'type_id','type');

        $this->dropForeignKey('fk_repair_type', '{{%talon}}');
        $this->alterColumn('talon','type_repair_id', Schema::TYPE_STRING);
        $this->renameColumn('talon', 'type_repair_id','type_repair');

    }
}
    
