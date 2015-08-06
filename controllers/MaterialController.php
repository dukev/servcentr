<?php

namespace app\controllers;

use yii;
use yii\web\Controller;
use app\models\MaterialActual;
use app\models\Material;
use app\models\MaterialSearch;

class MaterialController extends Controller
{
	public function actionIndex()
	{
		//$aDate = date('Y-m-d');
		//$dataProvider = MaterialActual::getActualMaterials($aDate);
		$search = [];
		$params = Yii::$app->request->get();
		if (isset($params['MaterialSearch'])) {
			$search = $params['MaterialSearch'];
		} 
		if (isset($params['aDate'])) {
			$aDate = $params['aDate'];
		} else {
			$aDate = date('Y-m-d');
			$params['aDate'] = $aDate;
		}
    $searchModel = new MaterialSearch();
		$dataProvider = $searchModel->search($params);
		
		return $this->render('index',['aDate' => $aDate, 
			'dataProvider' => $dataProvider, 
			'searchModel' => $searchModel ]);
	}

	public function actionUpdate($id)
	{
		$model = MaterialActual::getMaterial($id);
		//$model = Material::findOne($id);
		return $this->render('update', ['model' => $model]);
	}

	public function actionSave()
	{
		$material = Material::findOne($_POST['id']);
    $material->articul = $_POST['articul'];
    $material->name = $_POST['name'];
    $material->unit = $_POST['unit'];
    $material->desc = $_POST['desc'];
    $material->vendor_articul = $_POST['vendor_articul'];
    $material->save(false);
    $aDate = date('Y-m-d');
		$dataProvider = MaterialActual::getActualMaterials($aDate);
    //return $this->render('index',['aDate' => $aDate, 
			//'dataProvider' => $dataProvider]);
		$this->runAction('index');
	}

	public function actionFind()
	{
	  $params = Yii::$app->request->post();
    $searchModel = new MaterialSearch();
		$dataProvider = $searchModel->search($params);

		return $this->render('index', ['aDate' => $params['aDate'],
		  'dataProvider' => $dataProvider,
      'searchModel' => $searchModel, ]);
	}
}