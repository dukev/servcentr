<?php
  
namespace app\models;

use Yii;
use yii\db\Query;
use yii\data\ArrayDataProvider;
use yii\base\Model;

class MaterialActual extends Model
{
	const MARGIN = 1.4556;
	public $id;
	public $articul;
	public $name;
	public $vendor_articul;
	public $unit;
	public $desc;
	public $price;
	public $price_sale;
	public $amount;

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
     'price_sale' => 'Цена реализация',
     'amount' => 'Количество'
   ];
 }   

	static function getActualMaterials($date)
	{
		$result = [];
		$remains = Remains::find()->where('date <= :date', [':date' =>
			 $date])->orderBy(['date' => SORT_DESC])->all();
		foreach ($remains as $remain) {
			$material = new MaterialActual();
			$material->id = $remain->id_material;
			$material->articul = $remain->getIdMaterial()->one()->articul;
			$material->name = $remain->getIdMaterial()->one()->name;
			$material->vendor_articul = $remain->getIdMaterial()->one()->vendor_articul;
			$material->unit = $remain->getIdMaterial()->one()->unit;
			$material->desc = $remain->getIdMaterial()->one()->desc;
			$material->price = $remain->price;
			$material->amount = $remain->amount;
			$material->price_sale = $material->price * self::MARGIN;
			$result[] = $material;
		}
		$provider = new ArrayDataProvider(['allModels' => $result, 'key' => 'id',
			'pagination' => ['pageSize' => 10],
			'sort' => ['attributes' =>['name','articul','price']]]); 
		return $provider;
	}	

  static function getMaterial($id)
	{
		return (new Query())->select(['[[id]]', '[[name]]', '[[articul]]', '[[unit]]', 
				'[[desc]]', '[[vendor_articul]]'])->from('{{material}}')->where('id = :id',
				[':id' => $id ])->one();
		
	}

	static function getMaterials($params)
	{
		$query = (new Query())->select(['[[m.id]]', '[[m.name]]', '[[m.articul]]', '[[m.unit]]', '[[r.price]]', 
			'[[r.amount]]'])->from(['r'=>'{{remains}}'])->innerJoin(['m'=>'{{material}}'],
				'[[m.id]] = [[r.id_material]]')->where('[[r.date]] <= :date', [':date' =>
			 $params['aDate']]);
		if (isset($params['name']) and $params['name'] != null ) {
			 $query = $query->andWhere('m.name like :name',[':name' => '%' . 
			 $params['name'] . '%']);
		}
		if (isset($params['articul']) and $params['articul'] != null ) {
			 $quwery = $quwery->andWhere('m.articul like :articul',[':articul' => '%' . 
			 $params['articul'] . '%']);
		}	 
		if (isset($params['vendor_articul']) and $params['vendor_articul'] != null ) {
			 $quwery = $quwery ->andWhere('m.vendor_articul like :vendor_articul',[':vendor_articul' => '%' . 
			 $params['vendor_articul'] . '%']);
		}
		$result = $query->all();
		$provider = new ArrayDataProvider(['allModels' => $result, 'key' => 'id',
			'pagination' => ['pageSize' => 10],
			'sort' => ['attributes' =>['name','articul','price']]]); 
		return $provider;

	}

	static function getMaterialsByName($date, $name)
	{
		return (new Query())->select(['[[m.id]]', '[[m.name]]', '[[m.articul]]', '[[m.unit]]', '[[r.price]]', 
			'[[r.amount]]'])->from(['r'=>'{{remains}}'])->innerJoin(['m'=>'{{material}}'],
				'[[m.id]] = [[r.id_material]]')->where('[[r.date]] <= :date', [':date' =>
			 $date])->andWhere('m.name like :name',[':name' => '%' . 
			 $name . '%'])->orderBy('[[r.date]]')->all();
	}

	static function getMaterialsByArticul($date, $name)
	{
		return (new Query())->select(['[[m.id]]', '[[m.name]]', '[[m.articul]]', '[[m.unit]]', '[[r.price]]', 
			'[[r.amount]]'])->from(['r'=>'{{remains}}'])->innerJoin(['m'=>'{{material}}'],
				'[[m.id]] = [[r.id_material]]')->where('[[r.date]] <= :date', [':date' =>
			 $date])->andWhere('m.articul like :name',[':name' => '%' . $name . 
			 '%'])->orderBy('[[r.date]]')->all();
		
	}

	static function getMaterialsByVendorArticul($date, $name)
	{
		return (new Query())->select(['[[m.id]]', '[[m.name]]', '[[m.articul]]', '[[m.unit]]', '[[r.price]]', 
			'[[r.amount]]'])->from(['r'=>'{{remains}}'])->innerJoin(['m'=>'{{material}}'],
				'[[m.id]] = [[r.id_material]]')->where('[[r.date]] <= :date', [':date' =>
			 $date])->andWhere('m.vendor_articul like :name',[':name' => '%' . $name . 
			 '%'])->orderBy('[[r.date]]')->all();
		
	}

  public function saveMaterial($id)
  {
   	$material = Material::find()->where(['id' => $this->id])->one();
  	$amterial->name = $this->name;
  	$material->articul = $this->articul;
  	$material->vendor_articul = $this->vendor_articul;
  	$material->unit = $this->unit;
  	$material->desc = $this->desc;
  	$material->update();
  } 
}