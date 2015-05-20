<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "movement".
 *
 * @property integer $id
 * @property string $date
 * @property integer $type_id
 * @property double $amount
 * @property double $price
 * @property string $desc
 * @property string $create_at
 * @property string $edit_at
 * @property integer $material_id
 *
 * @property TypeMovement $type
 * @property Material $material
 */
class Movement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'movement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'amount', 'price', 'create_at', 'material_id'], 'required'],
            [['date', 'create_at', 'edit_at'], 'safe'],
            [['type_id', 'material_id'], 'integer'],
            [['amount', 'price'], 'number'],
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
            'type_id' => 'Type ID',
            'amount' => 'Amount',
            'price' => 'Price',
            'desc' => 'Desc',
            'create_at' => 'Create At',
            'edit_at' => 'Edit At',
            'material_id' => 'Material ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(TypeMovement::className(), ['id' => 'type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterial()
    {
        return $this->hasOne(Material::className(), ['id' => 'material_id']);
    }
}
