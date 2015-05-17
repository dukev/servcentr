<?php

use yii\db\Schema;
use yii\db\Migration;

class m150517_114759_crete_movement extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%movement}}',[
            'id' => Schema::TYPE_PK,
            'date' => Schema::TYPE_DATE . ' NOT NULL',
            'type' => Schema::TYPE_STRING . ' NOT NULL',
            'amount' => Schema::TYPE_FLOAT . ' NOT NULL',
            'price' => Schema::TYPE_FLOAT . ' NOT NULL',
            'desc' => Schema::TYPE_STRING, 
            'create_at' => Schema::TYPE_DATETIME . ' NOT NULL',
            'edit_at' => Schema::TYPE_DATETIME,
            'material_id' => Schema::TYPE_INTEGER . ' NOT NULL' ],
            null );
        $this->createIndex('date','{{%movement}}','date', false);
        $this->createIndex('type','{{%movement}}','type', false);
        $this->addForeignKey('material_id', '{{%movement}}', 'material_id',
         '{{%material}}', 'id', $delete = null, $update = null);
        return true;
    }
    
    public function safeDown()
    {
        echo "m150517_114759_crete_movement cannot be reverted.\n";
        $this->dropTable('{{%movement}}');
        return true;
    }
}
