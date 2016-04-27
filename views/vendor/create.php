<?php

use yii\helpers\Html;


$this->title = 'Добавить производителя оборудования';
?>
<div class="vendor-create">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
