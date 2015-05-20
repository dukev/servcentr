<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "locksmith".
 *
 * @property integer $id
 * @property string $family
 * @property string $name
 * @property string $patronymic
 * @property string $information
 *
 * @property Talon[] $talons
 */
class Locksmith extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'locksmith';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['family', 'name', 'patronymic', 'information'], 'required'],
            [['family', 'name', 'patronymic'], 'string', 'max' => 20],
            [['information'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'family' => 'Family',
            'name' => 'Name',
            'patronymic' => 'Patronymic',
            'information' => 'Information',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTalons()
    {
        return $this->hasMany(Talon::className(), ['locksmith_id' => 'id']);
    }
}
