<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$this->title = 'Субъекты:' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Справочники', 'url' => ['catalog/index']];
$this->params['breadcrumbs'][] = ['label' => 'Субъекты', 'url' => ['index']];
$this->params['breadcrumbs'][] =['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>

<div class="subject-update">

    <h1><?= Html::encode($this->title) ?></h1>

	<?= $this->render('_form', ['model' => $model]) ?>	   
</div>
