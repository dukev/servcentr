<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = 'Сервисный центр';
?>
<h2>Справочники</h2>
<ul>
	<li><?= Html::a('Материалы', 'index.php?r=material') ?></li>
	<li><?= Html::a('Оборудование', 'index.php?r=equipment') ?></li>	
	<li><?= Html::a('Работы', 'index.php?r=job') ?></li>
	<li><?= Html::a('Слесаря', 'index.php?r=locksmith') ?></li>
	<li><?= Html::a('Субъекты', 'index.php?r=subject') ?></li>	
</ul>