<?php
use developeruz\db_rbac\behaviors\AccessBehavior;


$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'name' => 'Сервисный центр',
    'language' => 'ru',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '12345',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\modules\users\models\User',
            'enableAutoLogin' => true,
            'enableSession' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<controler>/<action>' => '<controler>/<action>',
            ],
        ],
        'authManager' =>[
            'class' => 'yii\rbac\DbManager',
        ],
    ],
    'modules' => [
        'material' => [
            'class' => 'app\modules\material\MaterialModule',
        ],
        'admin' => [
            'class' => 'app\modules\admin\AdminModule',
        ],
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
        ], 
        'rbac' => [
            'class' => 'johnitvn\rbacplus\Module',
            'userModelClassName'=> 'app\modules\users\models\User',
            'userModelLoginField'=>'name',
        ],
        'permit' => [
            'class' => 'developeruz\db_rbac\Yii2DbRbac',
            'params' => [
                'userClass' => 'app\modules\users\models\User'
            ],
            
        ],
    ],
    
    'as AccessBehavior' => [
        'class' => AccessBehavior::className(),
        'rules' => [
            'site' => [
                [
                  'actions' => ['login', 'logout','index', 'about', 'contact'],
                  'allow' => true,
                ],
            ],            
            'information' => [
                [
                  'actions' => ['index'],
                  'allow' => true,
                ]
            ],
            'our-clients' => [
                [
                  'actions' => ['index'],
                  'allow' => true,
                ]
            ],
            'debug/default' => [
                [
                  'actions' => ['index', 'toolbar', 'view'],
                  'allow' => true,
                ],
            ],
            'catalog' => [
                [
                  'actions' => ['index'],
                  'allow' => true,
                ]
            ],
            'job' => [
                [
                  'actions' => ['index'],
                  'allow' => true,
                ]
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
