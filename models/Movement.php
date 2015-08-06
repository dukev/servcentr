<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "movement".
 *
 * @property integer $id
 * @property integer $id_material
 * @property integer $id_type_move
 * @property integer $id_subject
 * @property string $date
 * @property double $amount
 * @property double $price
 *
 * @property Material $idMaterial
 * @property TypeMove $idTypeMove
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
            [['id_material', 'id_type_move', 'id_subject', 'date', 'amount', 'price'], 'required'],
            [['id_material', 'id_type_move', 'id_subject'], 'integer'],
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
            'id_type_move' => 'Id Type Move',
            'id_subject' => 'Id Subject',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTypeMove()
    {
        return $this->hasOne(TypeMove::className(), ['id' => 'id_type_move']);
    }
}
