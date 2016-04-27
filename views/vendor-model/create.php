<?php

use yii\helpers\Html;

$this->title = 'Добавление оборудования';
$this->params['breadcrumbs'][] = ['label' => 'Справочники', 'url' => ['catalog/index']];
$this->params['breadcrumbs'][] = ['label' => 'Оборудование', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title = 'Добавление оборудования';
?>

<div class="vendor-model">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'equipment' => $equipment,
        'vendors' => $vendors,
    ]) ?>

</div>
