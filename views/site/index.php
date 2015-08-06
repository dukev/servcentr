<?php
/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'Сервисный центр';
?>
<nav>
	<ul>    
    <li><a href="#">Структура</a></li>
    <li><?= Html::a('Справочники','index.php?r=catalog'); ?></li>
    <li><?= Html::a('Операции','index.php?r=operation'); ?></li>
    <li><a href="#">Отчеты<a></li>
  </ul>
</nav>
