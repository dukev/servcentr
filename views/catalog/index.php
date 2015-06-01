<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = 'Сервисный центр';
?>
<h2>Справочники</h2>
<ul>
	<li><?= Html::a('Список материалов', 'index.php?r=material') ?></li>
	<li><?= Html::a('Список слесарей', 'index.php?r=locksmith') ?></li>
</ul>