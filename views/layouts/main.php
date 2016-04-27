<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode(Yii::$app->name) ?></title>
    <?php $this->head() ?>
		<link rel="shortcut icon" href="/servcentr/views/images/hammer_screwdriver.png" type="image/png">

</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'Сервисный центр',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Главная', 'url' => ['index']],
                    ['label' => 'О проекте', 'url' => ['/site/about']],
                    ['label' => 'Контакты', 'url' => ['/site/contact']],
                    Yii::$app->user->isGuest ?
                        ['label' => 'Login', 'url' => ['/site/login']] :
                        ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                            'url' => ['logout'],
                            'linkOptions' => ['data-method' => 'post']],
                ],
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? 
                $this->params['breadcrumbs'] : [],
                'homeLink' => ['label' => 'Главная', 'url' => ['/']]
            ]) ?>

            <main>
            <?= $content ?>
            </main>

        </div>
    </div>

    <footer class="footer">
        <div class="container">
         <!--<p class="pull-center">Все права на материалы, размещенные на сайте, охраняются в соответствии с законодательством Украины.</p> -->
      <p class="pull-center">&copy; Бойко Виталий. Все права защищены. 2016 &iquest;   E-mail: <a href="mailto:vitaliy.duke@gmail.com">vitaliy.duke@gmail.com</a></p>
    <!--<p class="pull-left">&copy; My Company <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        -->
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
