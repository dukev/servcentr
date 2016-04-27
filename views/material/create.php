<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Material */

$this->title = 'Добавление материалов';
$this->params['breadcrumbs'][] = ['label' => 'Справочники', 'url' => ['catalog/index']];
$this->params['breadcrumbs'][] = ['label' => 'Материалы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title = 'Добавление материалов';
?>
<div class="material-create">

    <h1><?= Html::encode($this->title) ?></h1> 

    <div class="material-form">

    <?php $form = ActiveForm::begin(); ?>
  
    <?= $form->field($material, 'name')->textInput(['maxlength' => true, 'placeholder' => 'введите наименование']) ?>

    <?= $form->field($material, 'unit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($material, 'articul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($material, 'vendor_articul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($material, 'desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($movement, 'date')->input('date') ?>

    <?= $form->field($movement, 'id_type_move')->dropDownList($type_move)->label('Перемещение') ?>

 		<?= $form->field($movement, 'id_subject')->dropDownList($subject)->label('Субъект') ?>
    	
	  <?= $form->field($movement, 'amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($movement, 'price')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Отменить', Url::to(['material/index']), 
            ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>
