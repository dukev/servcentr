<?php

use yii\helpers\Html;

$this->title = 'Добавить пользователя';
//$this->params['breadcrumbs'][] = ['label' => 'Справочники', 'url' => ['catalog/index']];
//$this->params['breadcrumbs'][] = ['label' => 'Слесаря', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>

<div>

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
