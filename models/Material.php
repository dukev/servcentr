<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material".
 *
 * @property integer $id
 * @property string $articul
 * @property string $name
 * @property string $unit
 * @property string $desc
 * @property string $create_at
 * @property string $edit_at
 * @property integer $type_material_id
 *
 * @property TypeMaterial $typeMaterial
 * @property Movement[] $movements
 * @property Talon[] $talons
 */
class Material extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'material';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['articul', 'name', 'unit', 'create_at'], 'required'],
            [['create_at', 'edit_at'], 'safe'],
            [['type_material_id'], 'integer'],
            [['articul', 'name', 'unit', 'desc'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'articul' => 'Articul',
            'name' => 'Name',
            'unit' => 'Unit',
            'desc' => 'Desc',
            'create_at' => 'Create At',
            'edit_at' => 'Edit At',
            'type_material_id' => 'Type Material ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTypeMaterial()
    {
        return $this->hasOne(TypeMaterial::className(), ['id' => 'type_material_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovements()
    {
        return $this->hasMany(Movement::className(), ['material_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTalons()
    {
        return $this->hasMany(Talon::className(), ['material_id' => 'id']);
    }
}
