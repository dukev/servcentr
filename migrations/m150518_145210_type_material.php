<?php

use yii\db\Schema;
use yii\db\Migration;

class m150518_145210_type_material extends Migration
{
   public function safeUp()
    {
        $this->createTable('{{%type_material}}',[
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL'
           ],
            null );
           $this->batchInsert('type_material', ['name'], [['ТМЦ'],['МБП'],['ОС']]);
           $this->addColumn('material','type_material_id',Schema::TYPE_INTEGER);
           $this->addForeignKey('fk_type_material','material','type_material_id',
            'type_material','id');
    }
    
    public function safeDown()
    {
        $this->dropForeignKey('fk_type_material','material');
        $this->dropColumn('material','type_material_id');
        $this->dropTable('{{%type_material}}');
    }
}
