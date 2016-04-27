<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\i18n\Formatter;

?>

<div class="job-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
  
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'unit')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать':'Изменить', 
            ['class' => $model->isNewRecord ? 'btn btn-success': 'btn btn-primary']) ?>
        <?= Html::a('Отменить', Url::to(['job/index']), 
            ['class' => 'btn btn-primary']) ?>
    </div>

    <?php if ($model->isNewRecord != true):?>  
        <div>
        <?= $this->render(
            '_table', 
            ['provider' => $provider,
            'id_job' => $model->id]);
        ?>
        </div>
    <?php endif; ?>

    <?php ActiveForm::end(); ?>

</div>
