<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material".
 *
 * @property integer $id
 * @property string $articul
 * @property string $name
 * @property string $unit
 * @property string $desc
 * @property string $vendor_articul
 *
 * @property Movement[] $movements
 * @property TalonMaterial[] $talonMaterials
 */
class Material extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'material';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['articul', 'name', 'unit'], 'required'],
            [['articul', 'name', 'unit', 'desc'], 'string', 'max' => 255],
            [['vendor_articul'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'articul' => 'Артикул',
            'name' => 'Наименование',
            'unit' => 'Ед. изм.',
            'desc' => 'Примечание',
            'vendor_articul' => 'Заводской артикул',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovements()
    {
        return $this->hasMany(Movement::className(), ['id_material' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTalonMaterials()
    {
        return $this->hasMany(TalonMaterial::className(), ['id_material' => 'id']);
    }
}
