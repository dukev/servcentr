<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Справочники', 'url' => ['catalog/index']];
$this->params['breadcrumbs'][] = ['label' => 'Оборудование', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="vendor-model">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
       
        <?= Html::a('редактировать', ['update', 'id' => $model->id],
            ['class' => 'btn btn-primary']) ?>
        <?= Html::a('удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
 
    </p>

  <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'type',
            'vendor',
            'name',
            'desc',
         ],
    ]) ?>

    <?= Html::a('Перейти к списку оборудования', 
            Url::to(['vendor-model/index']), 
                ['class' => 'btn btn-success']) ?> 
</div>
