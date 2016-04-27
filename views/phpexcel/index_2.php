<?php

include_once 'PHPExcel/IOFactory.php';

use yii\grid\GridView;
use yii\data\ArrayDataProvider;
use yii\i18n\Formatter;
use app\models\ExcelPhp;
use yii\base\Model;
//use c:\xampp\php\pear\PHPExcel;


$xlsData = new ExcelPhp;
$xlsFile = 'C:xampp\htdocs\servcentr\TMC_01.08.15.xls';
$xlsArray = $xlsData->getXls($xlsFile); 

$xlsProvider = new ArrayDataProvider (['allModels' => $xlsArray]);

GridView::widget([
  'dataProvider' => $xlsProvider,
  'formatter' => ['class' => 'yii\i18n\Formatter', 
    'nullDisplay' => ''],
  'columns' => [
     ['class' => 'yii\grid\SerialColumn',
      'header' => '№ пп'],
     ['attribute' => 'price',
      'format' => 'decimal'
     ],

  ],
  ]);

foreach ($xlsArray as $k1 => $i)
  {
    foreach ($i as $k2 => $j)
    { 
      echo $xlsArray[$k1][$k2]."\t"; 
    } 
    echo "<br>";
  }

