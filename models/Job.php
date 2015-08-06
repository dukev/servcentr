<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "job".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property string $unit
 *
 * @property JobPrice[] $jobPrices
 * @property TalonJob[] $talonJobs
 */
class Job extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'job';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name', 'unit'], 'required'],
            [['code'], 'string', 'max' => 15],
            [['name'], 'string', 'max' => 255],
            [['unit'], 'string', 'max' => 25],
            [['code'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Код',
            'name' => 'Наименование вида работ',
            'unit' => 'Ед. изм.',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobPrices()
    {
        return $this->hasMany(JobPrice::className(), ['id_job' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTalonJobs()
    {
        return $this->hasMany(TalonJob::className(), ['id_job' => 'id']);
    }
}
