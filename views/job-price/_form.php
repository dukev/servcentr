<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>

<div class="job-price-form">

    <?php $form = ActiveForm::begin(); ?>  
  
    <?= $form->field($model, 'date')->input('date') ?>

    <?= $form->field($model, 'cost')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price_notax')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tax')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'labor_cost')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_job')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать':'Изменить', 
            ['class' => $model->isNewRecord ? 'btn btn-success': 'btn btn-primary']) ?>
        <?= Html::a('Отменить', Url::to(['job/index']), 
            ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
