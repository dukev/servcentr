<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\i18n\Formatter;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Материалы';
$this->params['breadcrumbs'][] = ['label' => 'Справочники', 'url' => ['catalog/index']];
$this->params['breadcrumbs'][] = $this->title;
$request = Yii::$app->getRequest();
?>

<script>
  function qDate()
  {
    var d = document.querySelector('#fdate').value;

    <?php
      $url = Url::base(true);
    ?>

    location = "<?= $url ?>?r=material&aDate=" + d;
  }

</script>

<div class="material-index">

   
    <h2><?= $this->title ?> <span> <?= $aDate ?></span></h2>
    <div>
        <label for="aDate">Выбрать дату</label>
        <input id="fdate" type="date" name="aDate" value="<?= $aDate ?>"
            onchange="qDate()">
      </div>   

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '', 
        'numberFormatterOptions' => [
         NumberFormatter::MIN_FRACTION_DIGITS => 2,
         NumberFormatter::MAX_FRACTION_DIGITS => 2]],    
        'layout' => '{items}{pager}{summary}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
              'header' => '№ пп'
            ],
            'name',
            'unit',
            'articul',
            'vendor_articul',
            ['attribute' => 'price',
             'format' => 'decimal'
            ],
            ['attribute' => 'price_sale',
             'format' => 'decimal'
            ],
            'amount',
            'desc',
            ['class' => 'yii\grid\ActionColumn',
             'contentOptions' => ['style' => 'width:70px;'],
             'header'=>'Действие',
             'template' => '{view} {update} ',
            ],
        ],
    ]); ?>


  <p> <?= Html::a('добавить материалы', ['create'],
       ['class' => 'btn btn-success']) ?> 
      <?= Html::a('перемещение материалов', ['/movement/index'], 
       ['class' => 'btn btn-success']) ?> 
  </p>
  
</div>
