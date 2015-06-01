<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Talon */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Talons',
 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="talon-view">

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'date',
            'type_repair_id',
            'locksmith_id',
            'material_id',
            'desc',
            'create_at',
            'edit_at',
        ],
    ]) ?>

</div>
