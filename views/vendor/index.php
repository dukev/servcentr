<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Производитель оборудования';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vendor-index">

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
        <?= Html::a('добавить производителя оборудования', ['create'], 
        ['class' => 'btn btn-success']) ?>
    </p>
</div>
