<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "talon_material".
 *
 * @property integer $id
 * @property integer $id_material
 * @property double $price
 * @property double $amount
 *
 * @property Material $idMaterial
 */
class TalonMaterial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'talon_material';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_material', 'price', 'amount'], 'required'],
            [['id_material'], 'integer'],
            [['price', 'amount'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_material' => 'Id Material',
            'price' => 'Цена',
            'amount' => 'Количество',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMaterial()
    {
        return $this->hasOne(Material::className(), ['id' => 'id_material']);
    }
}
