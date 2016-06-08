<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        [
            'label' => 'Empresas', 
            //'url' => ['/site/index']
            'items' => [
                 ['label' => 'Crear Empresa', 'url' => '#'],
                 '<li class="divider"></li>',
                 '<li class="dropdown-header">Dropdown Header</li>',
                 ['label' => 'Catalogo de Empresas', 'url' => '#'],
            ],
        ],
        [
            'label' => 'Parametros', 
            //'url' => ['/site/index']
            'items' => [
                '<li class="dropdown-header">Tipo de Cambio</li>',
                 ['label' => 'Crear Tipo Cambio', 'url' => '#'],
                 ['label' => 'Historico Tipo Cambio', 'url' => '#'],
                 '<li class="divider"></li>',
                 '<li class="dropdown-header">UFV</li>',
                 [
                     'label' => 'Crear UFV', 
                     'url' => Yii::$app->urlManager->createAbsoluteUrl('').'parametros/ufv/create',
                 ],
                 [
                     'label' => 'Historico UFV', 
                     'url' => Yii::$app->urlManager->createAbsoluteUrl('').'parametros/ufv/index'
                 ],
            ],
        ],
        [
            'label' => 'Home', 
            'url' => ['/site/index']
        ],
        [
            'label' => 'About', 
            'url' => ['/site/about']
        ],
        [
            'label' => 'Contact', 
            'url' => ['/site/contact']
        ],
    ];
   /* echo Nav::widget([
    'items' => [
            [
                'label' => 'Home',
                'url' => ['site/index'],
                'linkOptions' => [],
            ],
            [
                'label' => 'Dropdown',
                'items' => [
                     ['label' => 'Level 1 - Dropdown A', 'url' => '#'],
                     '<li class="divider"></li>',
                     '<li class="dropdown-header">Dropdown Header</li>',
                     ['label' => 'Level 1 - Dropdown B', 'url' => '#'],
                ],
            ],
            [
                'label' => 'Login',
                'url' => ['site/login'],
                'visible' => Yii::$app->user->isGuest
            ],
        ],
        'options' => ['class' =>'nav-pills'], // set this to nav-tab to get tab-styled navigation
    ]);*/
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
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
