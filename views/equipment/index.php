<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Тип оборудования';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipment-index">

    <h2>Тип оборудования</h2>

      <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '{items}{pager}{summary}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name', 
            ['class' => 'yii\grid\ActionColumn', 
             'contentOptions' => ['style' => 'width:70px;'],
             'header'=>'Действие', 
             'template' => '{view} {update} ',
            ],
        ],
    ]); ?>
    <p>
        <?= Html::a('добавить тип оборудования', ['create'], 
        ['class' => 'btn btn-success']) ?>
    </p>
</div>
