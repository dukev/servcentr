<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TypeMaterial */

$this->title = 'Update Type Material: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Type Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="type-material-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
