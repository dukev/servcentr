<?php 

use yii\helpers\Html;
use yii\grid\GridView;

$this->params['breadcrumbs'][] = ['label' => 'Панель управления', 'url' => ['']];
$this->params['breadcrumbs'][] = ['label' => 'Управление пользователями', 'url' => ['index']];
?>

<div >
    <h1>Пользователи</h1>
     
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '{items}{pager}{summary}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
              'header' => '№ пп'],
            'id',
            'name', 
            'login',
            'password',
            ['class' => 'yii\grid\ActionColumn', 
             'contentOptions' => ['style' => 'width:70px;'],
             'header'=>'Действие', 
             'template' => '{view} {update} ',
            ],
        ],
    ]); ?>
    <p>
        <?= Html::a('добавить пользователя', ['create'], 
        ['class' => 'btn btn-success']) ?>
    </p>
</div>
