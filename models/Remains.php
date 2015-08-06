<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "remains".
 *
 * @property integer $id
 * @property integer $id_material
 * @property string $date
 * @property double $amount
 * @property double $price
 *
 * @property Material $idMaterial
 */
class Remains extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'remains';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_material', 'date', 'amount', 'price'], 'required'],
            [['id_material'], 'integer'],
            [['date'], 'safe'],
            [['amount', 'price'], 'number']
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
            'date' => 'Дата',
            'amount' => 'Количество',
            'price' => 'Цена',
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
