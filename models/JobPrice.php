<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "job_price".
 *
 * @property integer $id
 * @property integer $id_job
 * @property string $date
 * @property string $cost
 * @property string $price_notax
 * @property string $tax
 * @property string $price
 * @property double $labor_cost
 *
 * @property Job $idJob
 */
class JobPrice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'job_price';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_job', 'date', 'cost', 'price_notax', 'tax', 'price', 'labor_cost'], 'required'],
            [['id_job'], 'integer'],
            [['date'], 'safe'],
            [['cost', 'price_notax', 'tax', 'price', 'labor_cost'], 'number'],
            [['id_job', 'date'], 'unique', 'targetAttribute' => ['id_job', 'date'], 
                'message' => 'The combination of Id Job and Date has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_job' => 'Id Job',
            'date' => 'Дата',
            'cost' => 'Себестоимость',
            'price_notax' => 'Стоимость без НДС',
            'tax' => 'НДС',
            'price' => 'Стоимость',
            'labor_cost' => 'Трудозатраты',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdJob()
    {
        return $this->hasOne(Job::className(), ['id' => 'id_job']);
    }
}
