<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use app\models\Job;
use app\models\JobPrice;
use app\models\JobSearch;

class JobPriceController extends \yii\web\Controller
{
   
public function actionIndex()
	{
	  $provider = new ActiveDataProvider([
           'query' => JobPrice::find(),
        ]);

	return $this->render('index', [
  		'dataProvider' => $provider,
  	  ]);

	}

	public function actionCreate($id_job)
    {    
        $model = new JobPrice();
        $model->id_job = $id_job;
        $model->date = date('Y-m-d');
				$name_id_job = Job::find($id_job)->one()->name;


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['job/index']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'name_id_job' => $name_id_job,
            ]);
        }
    }

public function actionUpdate($id)
    {
       $model = $this->findModel($id);
       if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['job/index']);
		} else 
		return $this->render('update', ['model' => $model]);
    }


protected function findModel($id)
    {
        if (($model = JobPrice::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
