<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Material */
$request = Yii::$app->getRequest();
?>
<div>
	<H2>Материалы: редактирование</H2>
	<form method="post" action="index.php?r=material/save">
		<input type="hidden" name="id" value="<?= $model['id'] ?>">
		<input type="hidden" name="<?= $request->csrfParam; ?>"
		  value="<?= $request->getCsrfToken(); ?>">
		<label for="name">наименование</label>
		<input type="text" name="name" value="<?= $model['name'] ?>">
		<label for="unit">ед. измерения</label>
		<input type="text" name="unit" value="<?= $model['unit'] ?>">
		<label for="articul">артикул</label>
    <input type="text" name="articul" value="<?= $model['articul'] ?>">
    <label for="vendor_articul">заводской артикул</label>
    <input type="text" name="vendor_articul" value="<?= $model['vendor_articul'] ?>">
		<label for="desc">примечание</label>
    <input type="text" name="desc" value="<?= $model['desc'] ?>">
    <input type="submit" value="изменить">
    <?= Html::a('отменить','index.php?r=material'); ?>
    <!--<input type="button" value="отменить" formaction="index.php?r=material" 
    		formmethod="get">-->
	</form>
	   
</div>
