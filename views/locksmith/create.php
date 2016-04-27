<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Locksmith */

$this->title = 'Добавить слесаря';
$this->params['breadcrumbs'][] = ['label' => 'Справочники', 'url' => ['catalog/index']];
$this->params['breadcrumbs'][] = ['label' => 'Слесаря', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="locksmith-create">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
