<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use app\models\Job;
use app\models\JobSearch;

Class JobController extends Controller
{
	public function actionIndex()
	{
		$params = Yii::$app->request->get();
		if (isset($params['aDate'])) {
			$aDate = $params['aDate'];			
		}
		else {
			$aDate = date('Y-m-d');			
			$params['aDate'] = $aDate;
		}
		$searchModel = new JobSearch();
		$provider = $searchModel->search($params);
		
    return $this->render('index', [
  	    'aDate' => $aDate,
  	    'dataProvider' => $provider,
  	    'searchModel' => $searchModel,
  	]);

	}

public function actionView($id)
    {
        $model = Job::getActualJob(date('Y-m-d'),$id)->one();
        return $this->render('view', [
            'model' => $model,
        ]);
    }
public function actionUpdate($id)
	{
		$model = $this->findModel($id);
        $provider = new ActiveDataProvider ([
        'query' => $model->getJobPrices(),
        'pagination' => [
          'pageSize' => 50,
        ],
        'sort' => [
          'attributes' => [
            'date' => [
                'asc' => ['date' => SORT_ASC],
                'default' => SORT_ASC],
            'cost',
            'price_notax',
            'tax',
            'price',
            'labor_cost'
          ]
        ]
      ]);


        //$model = Job::getActualJob(date('Y-m-d'),$id)->one();
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->id]);
		} else {
				return $this->render(
                    'update', ['model' => $model,
                    'provider' => $provider]);
			}
	}

public function actionCreate()
    {
        $model = new Job();
        $provider = new ActiveDataProvider ([
        'query' => $model->getJobPrices(),
        'pagination' => [
          'pageSize' => 50,
        ],
        'sort' => [
          'attributes' => [
            'date' => [
                'asc' => ['date' => SORT_ASC],
                'default' => SORT_ASC],
            'cost',
            'price_notax',
            'tax',
            'price',
            'labor_cost'
          ]
        ]
      ]);


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'provider' => $provider,
            ]);
        }
    }
    protected function findModel($id)
    {
        if (($model = Job::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}