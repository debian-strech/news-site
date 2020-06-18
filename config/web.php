<?php

use yii\authclient\Collection;

$params = require __DIR__ . '/params.php';

$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    "name" => "Stretch",
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru-RU',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',

    ],
    'components' => [
        'i18n' => [
            'translations' => [
                'traits' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@vendor/cinghie/yii2-traits/messages',
                ],
            ],
        ],



        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'Q0fRZJlh3uKlhXhPvxUFrHV_ZPvDlm4n',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        //
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',



            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.yandex.ru',
                'username' => '',
                'password' => '',
                'port' => '587',
                'encryption' => 'tls',
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,

        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            // Disable index.php  .
            'showScriptName' => true,
            // Disable r= routes
            'enablePrettyUrl' => true,
            'rules' => array(

                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',

            ),
        ],
    ],

    'modules' =>  [

        'admin' => [
            'class' => 'app\modules\admin\module',
        ],

        // Module Kartik-v Grid
        'gridview' =>  [
            'class' => '\kartik\grid\Module',
        ],

        //todo 28.11

        //depends extensions
        'markdown' => [
            'class' => 'kartik\markdown\Module',
        ],

        // Yii2 User
        'user' => [
            'class' => 'dektrium\user\Module',
            'adminPermission' => 'role, permission',
            'admins'=>['admin'],
            'enableUnconfirmedLogin' => true,//boolean
            'enableFlashMessages' => true,
            'enablePasswordRecovery' => true,
            'confirmWithin' => 21600,//integer
            'cost' => 12, //integer


        ],


    ],

    'params' => $params,
];
/*
if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.43.142'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.43.142'],
    ];
}
*/
return $config;
