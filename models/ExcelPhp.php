<?php

namespace app\models;


require_once 'c:\xampp\php\pear\PHPExcel\IOFactory.php';
require_once 'c:\xampp\php\pear\PHPExcel.php';
//require_once 'IOFactory.php' or die;

use Yii;
use yii\db\Query;
use yii\data\ArrayDataProvider;
use yii\base\Model;
use app\models\ExcelPhp;
use app\models\IOFactory;

class ExcelPhp extends Model
{
  public $articul;
  public $name;
  public $unit;
  public $amount;
  public $price;
  public $cost;
  public $data_coming;
  
public function attributeLabels()
 {
   return [
     'articul' => 'Артикул',
     'name' => 'Наименование',
     'unit' => 'Ед. изм.',
     'amount' => 'Количество',
     'price' => 'Цена',
     'cost' => 'Стоимость',
     'data_coming' => 'Дата поступления'
   ];
 } 

public function getXls($xls)
{
  $objPHPExcel = new PHPExcel_IOFactory;
  $objPHPExcel = PHPExcel_IOFactory::load($xls);
  $objPHPExcel->setActiveSheetIndex(0);
  $aSheet = $objPHPExcel->getActiveSheet();
 
  //этот массив будет содержать массивы содержащие в себе значения ячеек каждой строки
  $array = array();
  //получим итератор строки и пройдемся по нему циклом
  foreach($aSheet->getRowIterator() as $row){
    //получим итератор ячеек текущей строки
    $cellIterator = $row->getCellIterator();
    //пройдемся циклом по ячейкам строки
    //этот массив будет содержать значения каждой отдельной строки
    $item = array();
    foreach($cellIterator as $cell){
      //заносим значения ячеек одной строки в отдельный массив
      array_push($item, $cell->getCalculatedValue());
    }
    //заносим массив со значениями ячеек отдельной строки в "общий массв строк"
    array_push($array, $item);
  }
  return $array;
}  
}
