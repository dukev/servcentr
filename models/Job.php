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
     * @inheridoc
     */
    public function attributes()
    {
        return array_merge(parent::attributes(), [
            'date',
            'cost', 
            'price_notax',
            'tax',
            'price',
            'labor_cost'
        ]);
    }  

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
            'date' => 'Дата', 
            'cost' => 'Себестоимость',
            'price_notax' => 'Стоимость без НДС',
            'tax' => 'НДС',
            'price' => 'Стоимость с НДС',
            'labor_cost' => 'Трудозатраты'
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

    public static function getActualJobs($date)
    {
        $subJobPrice = JobPrice::find()
                                ->select(['date' =>'max([[date]])',
                                            'id_job'])
                                ->from('job_price')
                                ->where('[[date]] <= :date', [':date' => $date])
                                ->groupBy('id_job');

        $JobPrice = JobPrice::find()
                            ->select(['jp.id_job', 
                                       'jp.date', 
                                       'jp.cost',
                                       'jp.price_notax',
                                       'jp.tax',
                                       'jp.price',
                                       'jp.labor_cost'])
                            ->from(['jp' => 'job_price'])
                            ->innerJoin(['jp1' => $subJobPrice], 
                                '([[jp1.date]] = [[jp.date]] and [[jp.id_job]] = [[jp1.id_job]])'
                            );

        return self::find()
                    ->select(['id' => 'j.id',
                              'code' => 'j.code',
                              'name' => 'j.name',
                              'unit' => 'j.unit',
                              'date' => 'jp.date', 
                              'cost' => 'jp.cost',
                              'price_notax' => 'jp.price_notax',
                              'tax' => 'jp.tax',
                              'price' => 'jp.price',
                              'labor_cost' => 'jp.labor_cost' ])
                    ->from(['j' => 'job'])
                    ->innerJoin(['jp' => $JobPrice], '[[j.id]] = [[jp.id_job]]');
    }
    
    public static function getActualJob($date, $id)
    {
      return self::getActualJobs($date)
        ->where('[[j.id]] = :id', [':id' => $id]);
    }

}
