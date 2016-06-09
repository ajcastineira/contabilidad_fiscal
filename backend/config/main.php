<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'empresa' => [
            'class' => 'backend\modules\empresa\Empresa',
        ],
        'agenda' => [
            'class' => 'backend\modules\agenda\Agenda',
        ],
        'asiento' => [
            'class' => 'backend\modules\asiento\Asiento',
        ],
        'compra' => [
            'class' => 'backend\modules\compra\Compra',
        ],
        'gestion' => [
            'class' => 'backend\modules\gestion\Gestion',
        ],
        'planCuentas' => [
            'class' => 'backend\modules\planCuentas\PlanCuentas',
        ],
        'reportes' => [
            'class' => 'backend\modules\reportes\Reportes',
        ],
        'venta' => [
            'class' => 'backend\modules\venta\Venta',
        ],
        'parametros' => [
            'class' => 'backend\modules\parametros\Parametros',
        ],
        'balanceInicial' => [
            'class' => 'backend\modules\balanceInicial\BalanceInicial',
        ],
        'docificacion' => [
            'class' => 'backend\modules\docificacion\Docificacion',
        ],
    ],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        /*'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],*/
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];
