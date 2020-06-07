<?php

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

$config = [
    'id' => 'basic',
    'name'=>'Coach Me',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'view' => [
            'theme' => [
                'basePath' => '@app/themes/sableng7',
                'baseUrl' => '@web/themes/sableng7',
                'pathMap' => [
                    '@app/views' => '@app/themes/sableng7',
                ],
            ],
        ],

        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'anjing010189',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\MaUsers',
            'enableAutoLogin' => true,
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
        'i18n' => [
            'translations' => [
                'app' => [
             'class' => 'yii\i18n\GettextMessageSource',
             'sourceLanguage' => 'id-ID',

             'basePath' => '@app/messages'
                 ],
            'yii' => [
             'class' => 'yii\i18n\GettextMessageSource',
             'sourceLanguage' => 'en-US',

             'basePath' => '@app/messages'
            ],
           
              ],

       ],
        'db' => $db,
        'assetManager' => [
            // override bundles to use CDN :
            'bundles' => [
                'yii\bootstrap4\BootstrapAsset' => [
                    'sourcePath' => null,
                    //'baseUrl' => 'https://stackpath.bootstrapcdn.com/bootstrap/4.2.1',
                    'baseUrl' => 'http://assets.test',
                    'css' => [
                        'bootstrap/dist/css/bootstrap.min.css'
                    ],
                ],
                'yii\bootstrap4\BootstrapPluginAsset' => [
                    'sourcePath' => null,
                    //'baseUrl' => 'https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1',
                    'baseUrl' => 'http://assets.test',
                    'js' => [
                        'bootstrap/dist/js/bootstrap.bundle.min.js'
                    ],
                ],
            ],
        ],
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<controller:[\w-]+>/<id:\d+>' => '<controller>/view',
                '<controller:[\w-]+>/<action:[\w-]+>/<id:\d+>' => '<controller>/<action>',
            ],
        ],
      
        
    ],
    'params' => $params,
    
    
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['components']['assetManager']['forceCopy'] = true;
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
