<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>

<div class="subject-form">

    <?php $form = ActiveForm::begin(); ?>
  
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать':'Изменить', 
            ['class' => $model->isNewRecord ? 'btn btn-success': 'btn btn-primary']) ?>
        <?= Html::a('Отменить', Url::to(['subject/index']), 
            ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
