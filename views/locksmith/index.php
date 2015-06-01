<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Слесаря';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="locksmith-index">

    <h2>Слесаря</h2>

        <table>
          <theat>
            <tr>
              <th>№ п/п</th> 
              <th>ФИО</th> 
              <th>Информация</th> 
              <th></th>
            </tr>
          </theat>
          <tbody>
            <?php
              $count=1;
              foreach ($dataProvider->models as $item) : ?>
              <tr>
                <td><?= $count; ?></td>
                <td><?= $item->family . ' ' . $item->name . ' ' .
                  $item->patronymic; ?></td>
                <td><?= $item->information; ?></td>
                <td>
                  <?= Html::a('Редактировать','index.php?r=locksmith/update&id=' . $item->id) ?>
                  <?= Html::a('Удалить','index.php?r=locksmith/delete&id=' . $item->id) ?>
                </td>
              </tr>
              <?php $count++; 
              endforeach ; ?>
          </tbody>
        </table>

        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'family', 
            'name', 
            'patronymic',
            'information',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <p>
        <?= Html::a('добавить слесаря', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
