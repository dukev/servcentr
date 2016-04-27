<?php

namespace app\controllers;

use yii\web\Controller;

class InformationController extends Controller
{
	public function actionIndex()
	{
		return $this->render('index');
	}
}