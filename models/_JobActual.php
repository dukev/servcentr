<?php
  
namespace app\models;

use Yii;
use yii\db\Query;

class JobActual extends \yii\base\Model
{
	public $id;
	public $code;
	public $name;
	public $unit;
	public $cost;
	public $price_notax;
	public $tax;
	public $price;
	public $labor_cost;

 public function attributeLabels()
 {
   return [
     'id' => 'ID',
     'code' => 'Код',
     'name' => 'Наименование вида работ',
     'unit' => 'Ед. изм.',
     'cost' => 'Себестоимость',
     'price_notax' => 'Стоимость без НДС',
     'tax' => 'НДС',
     'price' => 'Стоимость',
     'labor_cost' => 'Трудозатраты',
   ];
 }   

	static function getActualJobs($date, $code = null, $name = null)
	{
		return (new Query())->select(['j.id', 'j.code', 'j.name', 'j.unit', 
			'p.cost', 'p.price_notax', 'p.tax', 'p.price', 'p.labor_cost'])->from(['j' => 'job',
			'p' => 'job_price'])->where(['j.id' => 'p.id_job'])->andWhere('p.date <= :date', [':date'
			 => $date])->filterWhere(['like', 'code', $code])->filterWhere(['like', 
			 'name', $name]);
	}
}