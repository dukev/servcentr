<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Talon */

$this->title = 'Сервисный центр';
$this->params['breadcrumbs'][] = ['label' => 'Талон', 
	'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title = 'Создать новый талон';
?>
<div class="talon-create">

    <h2><?= Html::encode($this->title = 'Создать новый талон') ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
