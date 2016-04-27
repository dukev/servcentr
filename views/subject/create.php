<?php

use yii\helpers\Html;

$this->title = 'Добавление субъектов';
$this->params['breadcrumbs'][] = ['label' => 'Справочники', 'url' => ['catalog/index']];
$this->params['breadcrumbs'][] = ['label' => 'Субъекты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title = 'Добавление субъектов';
?>
<div class="material-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
