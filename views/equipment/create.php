<?php

use yii\helpers\Html;


$this->title = 'Добавить новый тип оборудования';
?>
<div class="equipment-create">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
