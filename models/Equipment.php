<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipment".
 *
 * @property integer $id
 * @property string $name
 *
 * @property TalonJob[] $talonJobs
 */
class Equipment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'equipment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Оборудование',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTalonJobs()
    {
        return $this->hasMany(TalonJob::className(), ['id_equipment' => 'id']);
    }
}
