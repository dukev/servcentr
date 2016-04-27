<?php
/* @var $this yii\web\View */
use yii\helpers\Html;

$this->params['breadcrumbs'][] = $this->title;
?>

<nav>
	<ul>   
	  <li><?= Html::a('Информация о сервисном центре', ['/information']); ?></li> 
	  <li><?= Html::a('Документация','')?></li>
      <li><?= Html::a('Нашим клиентам', ['/our-clients'])?></li>
      <li><?= Html::a('Операции', ['/operation']); ?></li>
      <li><?= Html::a('Отчеты', ['/report']); ?></li>
      <li><?= Html::a('Справочники', ['/catalog']); ?></li>
      <li><?= Html::a('Новости','http://margaz.com.ua/index.php/news'); ?></li>
  </ul>
</nav>
