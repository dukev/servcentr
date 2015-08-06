<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\i18n\Formatter;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Материалы';
$request = Yii::$app->getRequest();

?>
<div class="material-index">

    <h2><?= $this->title ?> <span> <?= $aDate ?></span></h2>
    <!--<form method="post" action="index.php?r=material/find"> 
      <div>
        <label for="aDate">Выбрать дату</label>
        <input type="date" name="aDate" value="<?= $aDate ?>">
      </div>        
      <header>Поиск</header>
      <div>
        <label for="name">наименование</label>
        <input type="text" name="name" placeholder="наименование материала">
        <label for="articul">артикул</label>
        <input type="text" name="articul" placeholder="артикул">
        <label for="vendir_articul">заводской артикул</label>
        <input type="text" name="vendor_articul" placeholder="заводской артикул">
        <input type="submit" value="Поиск">
        <input type="hidden" name="<?= $request->csrfParam; ?>"
          value="<?= $request->getCsrfToken(); ?>">
      </div> 
    </form>-->
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '', 
        'numberFormatterOptions' => [
         NumberFormatter::MIN_FRACTION_DIGITS => 0,
         NumberFormatter::MAX_FRACTION_DIGITS => 2]],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'unit',
            'articul',
            'vendor_articul',
            'price',
            'price_sale',
            'amount',
            'desc',
            ['class' => 'yii\grid\ActionColumn',
             'contentOptions' => ['style' => 'width:70px;'],
             'header'=>'Действие',
             'template' => '{update} ',
            ],
        ],
    ]); ?>
    <!--<p> <?= Html::a('добавить материалы', ['create'], ['class' => 'btn btn-success']) ?> </p>
    <p> <?= Html::a('перемещение материалов', [''], ['class' => 'btn btn-success']) ?> </p>-->
</div>
