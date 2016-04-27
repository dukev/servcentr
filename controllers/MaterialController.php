<?php

namespace app\controllers;

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

class MaterialController extends Controller
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

		// получаем запрос на актуальные материалы
		//$query = Material::getActualMaterials($aDate);

		$searchModel = new MaterialSearch();
		$provider = $searchModel->search($params);

		// отображаем страницу /views/materials/index.php
		return $this->render('index', [
				'aDate' => $aDate,
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
        $material = new Material();
        $movement = new Movement();
        $remains = new Remains();

        $type_move = ArrayHelper::map((new Query())->from('type_move')->all(),'id', 'name'); 
        $subject = ArrayHelper::map((new Query())->from('subject')->all(),'id', 'name'); 

        $post = Yii::$app->request->post();

        if (!empty($post)){
        	$material->articul = $post['Material'] ['articul'];
        	$material->name = $post['Material'] ['name'];
          $material->unit = $post['Material'] ['unit'];
          $material->desc = $post['Material'] ['desc'];
        	$material->vendor_articul = $post['Material'] ['vendor_articul'];
         	$material->save();
          
          $movement->id_material = $material->id;
          $movement->id_type_move = $post['Movement'] ['id_type_move'];
          $movement->id_subject = $post['Movement'] ['id_subject'];
          $movement->date = $post['Movement'] ['date'];
          $movement->amount = $post['Movement'] ['amount'];
          $movement->price = $post['Movement'] ['price'];
        	$movement->save();
        	
          $remains->id_material = $material->id;
          $remains->date = $movement->date;
          $remains->amount = $movement->amount;
          $remains->price = $movement->price;
        	$remains->save();

        	return $this->redirect(['material/index']);
        }
        else {
          return $this->render('create', [
                'material' => $material,
                'movement' => $movement,
                'type_move' => $type_move,
                'subject' => $subject,
          ]);
        }
    }
public function actionDelete($id)
    {
        $this->findModel($id)->delete();

// Необходимо добавить проверку на отсутствие связей с remains, movement

        return $this->redirect(['index']);
    }

	/**
     * Finds the Locksmith model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Locksmith the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
  protected function findModel($id)
  {
    if (($model = Material::findOne($id)) !== null) {
        return $model;
    } else {
        throw new NotFoundHttpException('The requested page does not exist.');
      }
  }
}