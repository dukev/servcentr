<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TypeMaterial */

$this->title = 'Create Type Material';
$this->params['breadcrumbs'][] = ['label' => 'Type Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-material-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
