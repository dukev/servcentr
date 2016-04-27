<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\i18n\Formatter;
use yii\widgets\DetailView;

//$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Справочники', 'url' => ['catalog/index']];
$this->params['breadcrumbs'][] = ['label' => 'Работы (услуги)', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="job-view">

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
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '', 
        'numberFormatterOptions' => [
         NumberFormatter::MIN_FRACTION_DIGITS => 2,
         NumberFormatter::MAX_FRACTION_DIGITS => 2]], 
        'attributes' => [
            'code',
            'name',
            'unit',
            ['label' => $model->attributeLabels()['cost'],
              'value' => $model->cost,
              'format' => 'decimal',
            ],
            ['label' => $model->attributeLabels()['price_notax'],
              'value' => $model->price_notax,
              'format' => 'decimal',
            ],
            ['label' => $model->attributeLabels()['tax'],
              'value' => $model->tax,
              'format' => 'decimal'
            ],
            ['label' => $model->attributeLabels()['price'],
              'value' => $model->price,
              'format' => 'decimal'
            ],
            ['label' => $model->attributeLabels()['labor_cost'],
              'value' => $model->labor_cost,
              'format' => 'decimal'
            ],
        ],
    ]) ?>
    
    <?= Html::a('Перейти к списку работ (услуг)', 
            Url::to(['job/index']), 
                ['class' => 'btn btn-success']) ?> 
</div>
