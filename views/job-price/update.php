<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;


$this->title = 'Работы (услуги):' . ' ' . $model->getIdJob()->one()->name;
$this->params['breadcrumbs'][] = ['label' => 'Справочники', 'url' => ['catalog/index']];
$this->params['breadcrumbs'][] = ['label' => 'Работы (услуги)', 'url' => ['job/index']];
$this->params['breadcrumbs'][] =['label' => $model->getIdJob()->one()->name, 'url' => ['job/view', 'id' => $model->getIdJob()->one()->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>

<iv class="job-price--update">

    <h1><?= Html::encode($this->title) ?></h1>

	<?= $this->render('_form', ['model' => $model]) ?>	   
	
</div>
