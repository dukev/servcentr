<?php

use yii\helpers\Html;	

/* @var $this yii\web\View */
/* @var $model app\models\Locksmith */

$this->title = 'Слесарь:' . ' ' . $model->family;

$this->params['breadcrumbs'][] = ['label' => 'Справочники', 'url' => ['catalog/index']];
$this->params['breadcrumbs'][] = ['label' => 'Слесаря', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->family, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="locksmith-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
