<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Job;
use app\models\JobPrice;

Class JobController extends Controller
{
	public function actionIndex($date)
	{
		$jobprices = JobPrice::find()->where('date <= :date', [':date' =>
			 $date)->orderBy('date' => SORT_DESC])->all();


	}
}