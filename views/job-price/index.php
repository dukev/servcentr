<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\i18n\Formatter;
use yii\helpers\Url;

$this->title = 'Работы (услуги)';
$this->params['breadcrumbs'][] = ['label' => 'Справочники', 'url' => ['catalog/index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="job-price-index">

<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '', 
        'numberFormatterOptions' => [
         NumberFormatter::MIN_FRACTION_DIGITS => 2,
         NumberFormatter::MAX_FRACTION_DIGITS => 2]],    
        'layout' => '{items}{pager}{summary}',
        'columns' => [
             ['class' => 'yii\grid\SerialColumn',
              'header' => '№ пп'
             ],
             'date',
             ['attribute' => 'cost',
             'format' => 'decimal'
             ],
             ['attribute' => 'price_notax',
             'format' => 'decimal'
             ],
             ['attribute' => 'tax',
             'format' => 'decimal'
             ],
             ['attribute' => 'price',
             'format' => 'decimal'
             ],
             'labor_cost',
            ['class' => 'yii\grid\ActionColumn',
             'contentOptions' => ['style' => 'width:70px;'],
             'header'=>'Действие',
             'template' => '{update} ',
            ],
        ],
    ]); ?>
  <p> <?= Html::a('добавить новую цену на работы (услуги)', ['create'],
        ['class' => 'btn btn-success']) ?> 
  </p>

</div>