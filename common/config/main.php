<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'modules'=>[
        //Inicio-Para el administrador de usuarios
        'admin' => [
            'class' => 'mdm\admin\Module',
        ],
        
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        //Inicio-Para el administrador de usuarios
        'authManager' => [
            'class' => 'yii\rbac\DbManager',  // or use  'yii\rbac\PhpManager',
        ],
        
        //Fin-Para el administrador de usuarios
    ],
    'as access' => [
        'class' => 'mdm\admin\classes\AccessControl',
        'allowActions' => [
            'admin/*', // add or remove allowed actions to this list
        ]
    ],
];
