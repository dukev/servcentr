<?php
use yii\helpers\Html;
?>

<div>
    <h1>Панель управления</h1>
    <ul> 
        <li><?= Html::a('Управление пользователями',['/admin/users']); ?></li>
        <li><?= Html::a('Управление контентом',''); ?></li>
        <li><?= Html::a('Статистика',''); ?></li>
    </ul>

</div>
