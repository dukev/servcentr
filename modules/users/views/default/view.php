<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;


$this->params['breadcrumbs'][] = ['label' => 'Панель управления', 'url' => ['']];
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title = $model->name;;

?>
<div>

    <h2><?= Html::encode($this->title) ?></h2>

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
            'name',
            'login',
            'password',
        ],
    ]) ?>

    <?= Html::a('Перейти к списку пользователей', 
            Url::to(['index']), 
                ['class' => 'btn btn-success']) ?> 

</div>
