<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vendor_model".
 *
 * @property integer $id
 * @property string $name
 * @property integer $id_vendor
 *
 * @property TalonJob[] $talonJobs
 * @property Vendor $idVendor
 * @property Vendor $idVendor0
 */
class VendorModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vendor_model';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'id_vendor'], 'required'],
            [['id_vendor'], 'integer'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Модель/Тип',
            'id_vendor' => 'Id Vendor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTalonJobs()
    {
        return $this->hasMany(TalonJob::className(), ['id_model' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdVendor()
    {
        return $this->hasOne(Vendor::className(), ['id' => 'id_vendor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdVendor0()
    {
        return $this->hasOne(Vendor::className(), ['id' => 'id_vendor']);
    }
}
