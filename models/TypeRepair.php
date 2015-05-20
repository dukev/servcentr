<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "type_repair".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Talon[] $talons
 */
class TypeRepair extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'type_repair';
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
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTalons()
    {
        return $this->hasMany(Talon::className(), ['type_repair_id' => 'id']);
    }
}
