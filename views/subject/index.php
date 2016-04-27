<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Субъекты';
$this->params['breadcrumbs'][] = ['label' => 'Справочники', 'url' => ['catalog/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="subject-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '{items}{pager}{summary}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
              'header' => '№ пп'
            ],
            'name',
            ['class' => 'yii\grid\ActionColumn',
             'contentOptions' => ['style' => 'width:70px;'],
             'header'=>'Действие',
             'template' => '{view} {update} ',
            ],
        ],
    ]); ?>
    <p>
        <?= Html::a('добавить субъекта', ['create'], 
        ['class' => 'btn btn-success']) ?>
    </p>
</div>
