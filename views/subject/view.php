<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Справочники', 'url' => ['catalog/index']];
$this->params['breadcrumbs'][] = ['label' => 'Субъекты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="subject-view">

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
            'name'
        ],
    ]) ?>
    
    <?= Html::a('Перейти к списку субъектов', 
            Url::to(['subject/index']), 
                ['class' => 'btn btn-success']) ?> 
</div>
