<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
//            ['label' => 'main', 'url' => ['/gen-project']],
            ['label' => 'A-num', 'url' => ['/gen-a-number']],
            ['label' => 'B-num', 'url' => ['/gen-b-number']],
            ['label' => 'Call-limit', 'url' => ['/gen-sched']],
            [
                'label' => 'statistics',
                'items' => [
                    ['label' => 'B table Days ', 'url' => ['/gen-statistics-b/stat-numbers']],
                    ['label' => 'B table Numbers', 'url' => ['/gen-statistics-b/my-stat']],
                    ['label' => 'A table Days ', 'url' => ['/gen-statistics-a/stat-numbers']],
                    ['label' => 'A table Numbers', 'url' => ['/gen-statistics-a/my-stat']],

                ],
            ],
            ['label' => 'smb',
                'url' => 'http://nfs.teknolab.ru:8001' ,
                'linkOptions' => ['target' => '_blank'],
            ],
            ['label' => 'sms',
                'url' => 'http://nfs.teknolab.ru:8000' ,
                'linkOptions' => ['target' => '_blank'],
            ],
            ['label' => 'radmin',
                'url' => 'http://nfs.teknolab.ru:8086' ,
                'linkOptions' => ['target' => '_blank'],
            ],
            ['label' => 'cdr',
                'url' => 'http://nfs.teknolab.ru:8002' ,
                'linkOptions' => ['target' => '_blank'],
            ],
//            Yii::$app->user->isGuest ? (
//            ['label' => 'Login', 'url' => ['/site/login']]
//            ) : (
//                '<li>'
//                . Html::beginForm(['/site/logout'], 'post')
//                . Html::submitButton(
//                    'Logout (' . Yii::$app->user->identity->username . ')',
//                    ['class' => 'btn btn-link logout']
//                )
//                . Html::endForm()
//                . '</li>'
//            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
