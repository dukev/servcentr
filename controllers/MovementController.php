<?php

namespace app\controllers;

use yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use app\models\Movement;

class MovementController extends Controller
{
	public function actionIndex()
	{
		$params = Yii::$app->request->get();
		if (isset($params['type_move']) && 
					isset($params['subject'])) 
		{
			$type_move = $params['type_move'];			
			$subject = $params['subject'];
		}
		else {
			$type_move = '1';
			$params['type_move'] = $type_move;
			$subject = '1';
			$params['subject'] = $subject;
		}

		$searchModel = new Movement();
		$provider = $searchModel->search($params);

		return $this->render('index', [
				'type_move' => $type_move,
				'subject' => $subject,
				'dataProvider' => $provider,
				'searchModel' => $searchModel,
			]);
	}

	public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

  protected function findModel($id)
    {
        if (($model = Movement::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}