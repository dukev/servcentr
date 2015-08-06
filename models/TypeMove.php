<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "type_move".
 *
 * @property integer $id
 * @property string $name
 * @property integer $operation
 *
 * @property Movement[] $movements
 */
class TypeMove extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'type_move';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['operation'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['name', 'operation'], 'unique', 'targetAttribute' => ['name', 'operation'], 'message' => 'The combination of Name and Operation has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'operation' => 'Операция',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovements()
    {
        return $this->hasMany(Movement::className(), ['id_type_move' => 'id']);
    }
}
