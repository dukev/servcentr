<?php

use yii\helpers\Html;	

$this->title = 'Пользователь:' . ' ' . $model->name;

/*$this->params['breadcrumbs'][] = ['label' => 'Справочники', 'url' => ['catalog/index']];
$this->params['breadcrumbs'][] = ['label' => 'Слесаря', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->family, 'url' => ['view', 'id' => $model->id]];
*/
$this->params['breadcrumbs'][] = 'Редактировать';

?>
<div>

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
