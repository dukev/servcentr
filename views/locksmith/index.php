<?php

use yii\helpers\Html;
use yii\grid\GridView;
//use kartik\grid\GridView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Слесаря';

$this->params['breadcrumbs'][] = ['label' => 'Справочники', 'url' => ['catalog/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="locksmith-index">

    <h2>Слесаря</h2>

      <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '{items}{pager}{summary}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
              'header' => '№ пп'],
            'family', 
            'name', 
            'patronymic',
            'information',
            ['class' => 'yii\grid\ActionColumn', 
             'contentOptions' => ['style' => 'width:70px;'],
             'header'=>'Действие', 
             'template' => '{view} {update} ',
            ],
        ],
    ]); ?>
    <p>
        <?= Html::a('добавить слесаря', ['create'], 
        ['class' => 'btn btn-success']) ?>
    </p>
</div>
