<?php
  
namespace app\controllers;
use app\models\MaterialActual;

class TestController extends \yii\web\Controller
{
	public function actionIndex()
    {
    	
    	/*$model = MaterialActual::getActualMaterials(date('Y-m-d'));*/
    	$model = MaterialActual::getMaterial(date('Y-m-d'),'710');
    	return $this->render('material', ['model' => $model]);

    }
	

}