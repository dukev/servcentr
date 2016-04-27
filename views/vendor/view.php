<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

$this->title = 'Производитель оборудования';

?>
<div class="vendor-view">

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
            'name'
         ],
    ]) ?>

    <?= Html::a('Перейти к списку оборудования', 
            Url::to(['vendor-model/index']), 
                ['class' => 'btn btn-success']) ?>
</div>
