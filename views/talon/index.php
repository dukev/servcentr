<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Talons';
$this->params['breadcrumbs'][] = ['label' => 'Операции',
 'url' => ['/operation']];
$this->params['breadcrumbs'][] = $this->title = 'Талон';
?>
<div class="talon-index">

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('Создать талон', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'date',
            'type_repair_id',
            'locksmith_id',
            'material_id',
            // 'desc',
            // 'create_at',
            // 'edit_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
