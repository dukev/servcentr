<?php

use yii\helpers\Html;


$this->title = 'Тип оборудования:';

?>
<div class="equipment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
