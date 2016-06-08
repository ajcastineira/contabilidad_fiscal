<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
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
                 ['label' => 'Crear Empresa', 'url' => Yii::$app->urlManager->createAbsoluteUrl('').'empresa/empresa/create'],
                 ['label' => 'Catalogo de Empresas', 'url' => Yii::$app->urlManager->createAbsoluteUrl('').'empresa/empresa/index'],
            ],
        ],
        [
            'label' => 'Parametros', 
            //'url' => ['/site/index']
            'items' => [
                '<li class="dropdown-header">Tipo de Cambio</li>',
                 ['label' => 'Crear Tipo Cambio', 'url' => Yii::$app->urlManager->createAbsoluteUrl('').'parametros/tipo-cambio/create',],
                 ['label' => 'Historico Tipo Cambio', 'url' => Yii::$app->urlManager->createAbsoluteUrl('').'parametros/tipo-cambio/index'],
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
        
        
        ['label' => 'Home', 'url' => ['/site/index']],
    ];
    if (Yii::$app->user->isGuest) {
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
