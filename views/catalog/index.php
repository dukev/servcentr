<?php
/* @var $this yii\web\View */
use yii\helpers\Html;

$this->params['breadcrumbs'][] = ['label' => 'Справочники'] ?>

<h2>Справочники</h2>
<ul>
    <li><?= Html::a('Договора', ['/contract']) ?></li>
	<li><?= Html::a('Материалы', ['/material']) ?></li>
	<li><?= Html::a('Оборудование', ['/vendor-model']) ?></li>	
	<li><?= Html::a('Работы (услуги)', ['/job']) ?></li>
	<li><?= Html::a('Слесаря', ['/locksmith']) ?></li>
	<li><?= Html::a('Субъекты', ['/subject']) ?></li>	
</ul>