<?php

namespace app\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use app\models\VendorModel;
use app\models\VendorModelSearch;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\web\NotFoundHttpException;

Class VendorModelController extends Controller
{
	public function actionIndex()
	{
		$params = Yii::$app->request->get();
		$searchModel = new VendorModelSearch();
		$provider = $searchModel->search($params);
				
    return $this->render('index', [
  	'dataProvider' => $provider,
  	'searchModel' => $searchModel,
  	]);
	}

	public function actionCreate()
	{
			$model = new VendorModel();
			$vendors = ArrayHelper::map(
				(new Query())->from('vendor')->all(), 
				'id', 'name');
			$equipment = ArrayHelper::map(
				(new Query())->from('equipment')->all(), 
				'id', 'name');

      $params = Yii::$app->request->get();
		  $searchModel = new VendorModelSearch();
		  $provider = $searchModel->search($params);
			
			if ($model->load(Yii::$app->request->post()) && 
				  $model->save()) 
            return $this->redirect(['index']);
      else 
      	return $this->render('create', [
				  'model' => $model,
				  'equipment' => $equipment,
				  'vendors' => $vendors,
			  ]);
	}

  public function actionUpdate($id)
  {
    $model = $this->findModel($id);
      
    $vendors = ArrayHelper::map(
				(new Query())->from('vendor')->all(), 
				'id', 'name');
		$equipment = ArrayHelper::map(
				(new Query())->from('equipment')->all(), 
				'id', 'name');
		$params = Yii::$app->request->get();
		$searchModel = new VendorModelSearch();
		$provider = $searchModel->search($params);
    
      if ($model->load(Yii::$app->request->post()) && 
       	$model->save()) {
          	return $this->redirect(['index']);
     		} else {
         		return $this->render('update', [
             		'model' => $model,
             		'equipment' => $equipment,
				        'vendors' => $vendors,
         		]);
        	}
  }

public function actionView($id)
    {
      return $this->render('view', [
            'model' => VendorModel::findIdModel($id)->one(),
        ]);
    }

public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
protected function findModel($id)
    {
        if (($model = VendorModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}