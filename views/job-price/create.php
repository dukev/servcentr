<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$this->title = 'Добавление новых цен на работы (услуги):'  . ' ' . $name_id_job;
$this->params['breadcrumbs'][] = ['label' => 'Справочники', 'url' => ['catalog/index']];
$this->params['breadcrumbs'][] = ['label' => 'Работы (услуги)', 'url' => ['index']];
//$this->params['breadcrumbs'][] =['label' => $name_id_job, 'url' => ['job/view']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="job-price-create">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
 
    ]) ?>

</div>
