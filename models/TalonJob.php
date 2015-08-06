<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "talon_job".
 *
 * @property integer $id
 * @property integer $id_talon
 * @property integer $id_job
 * @property integer $id_equipment
 * @property integer $id_model
 * @property integer $amount
 *
 * @property Equipment $idEquipment
 * @property Job $idJob
 * @property Talon $idTalon
 * @property VendorModel $idModel
 */
class TalonJob extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'talon_job';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_talon', 'id_job', 'id_equipment', 'id_model', 'amount'], 'required'],
            [['id_talon', 'id_job', 'id_equipment', 'id_model', 'amount'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_talon' => 'Id Talon',
            'id_job' => 'Id Job',
            'id_equipment' => 'Id Equipment',
            'id_model' => 'Id Model',
            'amount' => 'Количество',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEquipment()
    {
        return $this->hasOne(Equipment::className(), ['id' => 'id_equipment']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdJob()
    {
        return $this->hasOne(Job::className(), ['id' => 'id_job']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTalon()
    {
        return $this->hasOne(Talon::className(), ['id' => 'id_talon']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdModel()
    {
        return $this->hasOne(VendorModel::className(), ['id' => 'id_model']);
    }
}
