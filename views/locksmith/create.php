<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Locksmith */

$this->title = 'Create Locksmith';
$this->params['breadcrumbs'][] = ['label' => 'Locksmiths', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="locksmith-create">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
