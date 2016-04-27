<?php

use yii\helpers\Html;


$this->title = 'Производитель оборудования:';

?>
<div class="vendor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
