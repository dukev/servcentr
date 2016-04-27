<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vendor".
 *
 * @property integer $id
 * @property string $name
 *
 * @property VendorModel[] $vendorModels */
class Vendor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vendor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
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
            'name' => 'Производитель/Марка',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendorModels()
    {
        return $this->hasMany(VendorModel::className(), ['id_vendor' => 'id']);
    }
}
