<?php

namespace app\modules\material\controllers;

use yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use app\models\Material;
use app\models\MaterialSearch;
use app\models\Movement;
use app\models\Remains;
use app\models\Subject;
use app\models\TypeMove;
use yii\helpers\ArrayHelper;
use yii\db\Query;

class DefaultController extends Controller
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
			$searchModel = new MaterialSearch();
			$provider = $searchModel->search($params);

      return $this->render('index', [
      		'aDate' => $aDate,
      		'dataProvider' => $provider,
				  'searchModel' => $searchModel,
      	]);
    }
}
