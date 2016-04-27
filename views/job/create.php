<?php

use yii\helpers\Html;

$this->title = 'Добавление работ (услуг)';
$this->params['breadcrumbs'][] = ['label' => 'Справочники', 'url' => ['catalog/index']];
$this->params['breadcrumbs'][] = ['label' => 'Работы (услуги)', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title = 'Добавление работ (услуг)';
?>
<div class="job-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,  'provider' => $provider]) ?>

</div>
