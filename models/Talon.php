<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "talon".
 *
 * @property integer $id
 * @property string $date
 * @property integer $id_type_repair
 * @property integer $id_locksmith
 *
 * @property TalonJob[] $talonJobs
 */
class Talon extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'talon';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'id_type_repair', 'id_locksmith'], 'required'],
            [['date'], 'safe'],
            [['id_type_repair', 'id_locksmith'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Дата',
            'id_type_repair' => 'Id Type Repair',
            'id_locksmith' => 'Id Locksmith',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTalonJobs()
    {
        return $this->hasMany(TalonJob::className(), ['id_talon' => 'id']);
    }
}
