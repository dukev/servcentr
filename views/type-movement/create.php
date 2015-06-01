<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TypeMovement */

$this->title = 'Create Type Movement';
$this->params['breadcrumbs'][] = ['label' => 'Type Movements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-movement-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
