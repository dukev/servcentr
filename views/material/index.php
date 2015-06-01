<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сервисный центр';
$this->params['breadcrumbs'][] = $this->title = 'Материалы';
?>
<div class="material-index">

    <h2><?= Html::encode($this->title) ?></h2>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'articul',
            'name',
            'unit',
            //'desc',
            // 'create_at',
            // 'edit_at',
            // 'type_material_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <p> <?= Html::a('добавить материалы', ['create'], ['class' => 'btn btn-success']) ?> </p>
    <p> <?= Html::a('перемещение материалов', [''], ['class' => 'btn btn-success']) ?> </p>

</div>
