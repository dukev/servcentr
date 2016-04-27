<?php

namespace app\controllers;

use yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use app\models\Subject;

class SubjectController extends Controller
{
	public function actionIndex()
	{
		$dataProvider = new ActiveDataProvider([
            'query' => Subject::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
	}

	public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

	public function actionUpdate($id)
	{
		$model = $this->findModel($id);
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->id]);
		} else {
				return $this->render('update', ['model' => $model]);
			}
	}

public function actionCreate()
    {
        $model = new Subject();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    protected function findModel($id)
    {
        if (($model = Subject::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}