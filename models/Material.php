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
 * @property string $price
 * @property string $price_sale
 * @property string $amount
 */
class Material extends \yii\db\ActiveRecord
{
    /**
     * @inheridoc
     */
    public function attributes()
    {
    	return array_merge(parent::attributes(), [
          'price',
          'price_sale',
          'amount'
        ]);
    }

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
            'price' => 'Цена',
            'price_sale' => 'Цена продажи',
            'amount' => 'Количество',
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

    /**
     * Возвращает ActiveQuery для получения всех остатков по материалу
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRemains()
    {
    	return $this->hasMany(Remains::className(), ['id_material' => 'id']);
    }

    /**
     * Возвращает ActiveQuery для получения актуального материала
     *
     * SQL-запрос:
     * select m.id, m.name, m.articul, m.vendor_articul, m.unit, m.desc, r.price, r.amount, (r.price * 1.4556) as price_sale
		 * from material m
		 * join (
		 *		select r.id_material, r.`date`, r.price, r.amount 
		 *    from remains r
		 *    join (
		 *       select max(`date`) as `date`, id_material 
		 *       from remains 
		 *       where `date` <= "2015-08-10" 
		 *       group by id_material
		 *    ) rr on r.`date` = rr.`date` and r.id_material = rr.id_material
		 * ) r on r.id_material = m.id;
     *
     * @param $date | string - дата в формате 'YYYY-MM-DD'
     * 
     * @return \yii\db\ActiveQuery
     */
    public static function getActualMaterials($date)
    {
    	/* подзапрос для самой вложенной группировки
    	 * select max(`date`) as `date`, id_material 
		   * from remains 
		   * where `date` <= :date 
		   * group by id_material
		  */
    	$subRemains = Remains::find()
    							->select(['date' =>'max([[date]])',
    								        'id_material'])
    							->from('remains')
    							->where('[[date]] <= :date', [':date' => $date])
    							->groupBy('id_material');

    	/* подзапрос для внутреннего соединения
    	 * select r.id_material, r.`date`, r.price, r.amount 
		   * from remains r
		   * join ( $subRemains ) rr on r.`date` = rr.`date` and r.id_material = rr.id_material
		  */

    	$remains = Remains::find()
    	                    ->select(['r.id_material', 
    	                    	       'r.date', 
    	                    	       'r.price', 
    	                    	       'r.amount'])
    	                    ->from(['r' => 'remains'])
    	                    ->innerJoin(['rr' => $subRemains], 
    	                    	'([[rr.date]] = [[r.date]] and [[rr.id_material]] = [[r.id_material]])'
    	                    );


    	//возвращаем ActiveQuery запрос на поиск актуальных по дате материалов
    	return self::find()
					->select(['id' => 'm.id',
							'name' => 'm.name',
							'articul' => 'm.articul',
							'vendor_articul' => 'm.vendor_articul',
							'unit' => 'm.unit',
							'desc' => 'm.desc',
							'price' => '[[r.price]]',
							'amount' => 'r.amount',
							'price_sale' => '(r.price * 1.4556)'])
					->from(['m' => 'material'])
					->innerJoin(['r' => $remains], '[[r.id_material]] = [[m.id]]');
    }

    
}
