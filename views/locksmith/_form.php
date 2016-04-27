<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Locksmith */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="locksmith-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'family')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'information')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', 
        	['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Отменить', Url::to(['locksmith/index']), 
            ['class' => 'btn btn-primary']) ?>  </div>

    <?php ActiveForm::end(); ?>

</div>
