<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Locksmith */

$this->params['breadcrumbs'][] = ['label' => 'Справочники', 'url' => ['catalog/index']];
$this->params['breadcrumbs'][] = ['label' => 'Слесаря', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title = $model->family;;
?>
<div class="locksmith-view">

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
            'family',
            'name',
            'patronymic',
            'information',
        ],
    ]) ?>

    <?= Html::a('Перейти к списку слесарей', 
            Url::to(['locksmith/index']), 
                ['class' => 'btn btn-success']) ?> 

</div>
