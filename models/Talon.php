<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "talon".
 *
 * @property integer $id
 * @property string $date
 * @property integer $type_repair_id
 * @property integer $locksmith_id
 * @property integer $material_id
 * @property string $desc
 * @property string $create_at
 * @property string $edit_at
 *
 * @property TypeRepair $typeRepair
 * @property Locksmith $locksmith
 * @property Material $material
 */
class Talon extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'talon';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'locksmith_id', 'material_id', 'create_at'], 'required'],
            [['date', 'create_at', 'edit_at'], 'safe'],
            [['type_repair_id', 'locksmith_id', 'material_id'], 'integer'],
            [['desc'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'type_repair_id' => 'Type Repair ID',
            'locksmith_id' => 'Locksmith ID',
            'material_id' => 'Material ID',
            'desc' => 'Desc',
            'create_at' => 'Create At',
            'edit_at' => 'Edit At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTypeRepair()
    {
        return $this->hasOne(TypeRepair::className(), ['id' => 'type_repair_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocksmith()
    {
        return $this->hasOne(Locksmith::className(), ['id' => 'locksmith_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterial()
    {
        return $this->hasOne(Material::className(), ['id' => 'material_id']);
    }
}
