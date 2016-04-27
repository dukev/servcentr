<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\i18n\Formatter;

//$id_job = $provider->getModel()->getIdJob()->one();

?>

<?= GridView::widget([
        'dataProvider' => $provider,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '', 
        'numberFormatterOptions' => [
         NumberFormatter::MIN_FRACTION_DIGITS => 2,
         NumberFormatter::MAX_FRACTION_DIGITS => 2]],    
        'layout' => '{items}{pager}{summary}',
        'columns' => [
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
             'controller' => 'job-price',
             'template' => '{update}',
            ],
        ],
    ]); 
?>

<div class="form-group">
       
        <?= Html::a('Добавить новую цену на работу (услугу)', Url::to(['job-price/create', 'id_job' => $id_job]), ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Отменить', Url::to(['job/index']), 
            ['class' => 'btn btn-primary']) ?>
</div>

