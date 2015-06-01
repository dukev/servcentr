<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\grid\GridView;
$this->title = 'Сервисный центр';


$this->params['breadcrumbs']['true'] = ['label' => 'Операции'];
?>

<h2>Операции</h2>

<p><?= Html::a('Талоны','index.php?r=talon'); ?></p>
<p><?= Html::a('Получение материалов (приход)'); ?></p>
<p><?= Html::a('Перемещение материалов'); ?></p>
<p><?= Html::a('Списание материалов (расход)'); ?></p>