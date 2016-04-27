<?php

use yii\helpers\Html;


$this->title = 'Оборудование:' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Справочники', 'url' => ['catalog/index']];
$this->params['breadcrumbs'][] = ['label' => 'Оборудование', 'url' => ['index']];
$this->params['breadcrumbs'][] =['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>

<div class="vendor-model">

    <h1><?= Html::encode($this->title) ?></h1>
 
    <?= $this->render('_form', [
        'model' => $model,
        'equipment' => $equipment,
        'vendors' => $vendors,
    ]) ?>

</div>
