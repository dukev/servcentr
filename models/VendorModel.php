<?php

namespace app\models;

use Yii;
use yii\base\Query;

/**
 * This is the model class for table "vendor_model".
 *
 * @property integer $id
 * @property string $name
 * @property integer $id_vendor
 *
 * @property TalonJob[] $talonJobs
 * @property Vendor $idVendor
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


    public function attributes()
    {
        return array_merge(parent::attributes(), [
            'vendor',
            'type',
        ]);
    }  


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'id_vendor', 'id_equipment'], 'required'],
            [['id_vendor'], 'integer'],
            [['id_equipment'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['desc'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Модель',
            'id_vendor' => 'Производитель',
            'id_equipment' => 'Тип оборудования',
            'vendor' => 'Производитель',
            'type' => 'Тип оборудования',
            'desc' => 'Примечание'
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

    public function getIdEquipment()
    {
        return $this->hasOne(Equipment::className(), ['id' => 'id_equipment']);
    }

    public static function getAllModels()
    {
        return self::find()
             ->select([
                'id' => 'm.id',
                'id_equipment' => 'm.id_equipment',
                'id_vendor' => 'm.id_vendor',
                'type' => 'e.name',
                'vendor' => 'v.name',
                'name' => 'm.name',
                'desc' => 'm.desc'
              ])
            ->from(['m' => 'vendor_model'])
            ->innerJoin(['e' => 'equipment'], 
                '[[m.id_equipment]] = [[e.id]]')
            ->innerJoin(['v' => 'vendor'], '[[m.id_vendor]] = [[v.id]]');       
    }
    public static function findIdModel($id)
    {
         return self::getAllModels()
                ->where('[[m.id]] = :id', [':id' => $id]);
    }
}
