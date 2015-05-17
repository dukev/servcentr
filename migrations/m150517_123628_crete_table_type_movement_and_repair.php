<?php

use yii\db\Schema;
use yii\db\Migration;

class m150517_123628_crete_table_type_movement_and_repair extends Migration
{
     public function safeUp()
    {
        $this->createTable('{{%type_movement}}',[
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL'
           ],
            null );
        $this->createTable('{{%type_repair}}',[
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL'
           ],
            null );
        return true;
    }
    
    public function safeDown()
    {
        echo "m150517_123628_crete_table_type_movement_and_repair cannot be reverted.\n";
        $this->dropTable('{{%type_movement}}');
        $this->dropTable('{{%type_repair}}');
        return true;
    }
}
