<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\i18n\Formatter;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Оборудование';
$this->params['breadcrumbs'][] = ['label' => 'Справочники', 'url' => ['catalog/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
  <div class="equipment-index">
  <h2><?= $this->title ?> </h2>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter', 
            'nullDisplay' => ''],    
        'layout' => '{items}{pager}{summary}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
              'header' => '№ пп' ],
            'type',
            'vendor',
            'name',
            'desc',
            ['class' => 'yii\grid\ActionColumn',
             'contentOptions' => ['style' => 'width:70px;'],
             'header'=>'Действие',
             'template' => '{view} {update} ',
            ],
        ],
    ]); ?>
    <p>
        <?= Html::a('добавить тип', 
            Url::to(['equipment/create']), ['class' => 'btn btn-success']) ?>
        <?= Html::a('добавить производителя', 
            Url::to(['vendor/create']), ['class' => 'btn btn-success']) ?>
        <?= Html::a('добавить модель', ['create'], 
            ['class' => 'btn btn-success']) ?>
    </p>

</div>
