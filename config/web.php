<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'language' => 'ru-RU',
    'components' => [
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'js'=>[]
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js'=>[]
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [],
                ],
            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '1Eg9w2-LX8Q5K5GI_4MN4ZaQqpMnPDjR',
            'baseUrl' => '',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => false,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'image' => [
            'class' => 'yii\image\ImageDriver',
            'driver' => 'GD',  //GD or Imagick
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
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
        'response' => [
            'class' => 'yii\web\Response',
            'on beforeSend' => function ($event) {
    if(Yii::$app->response->statusCode == 401) {

        Yii::$app->response->headers->add('Access-Control-Allow-Origin','*');
        Yii::$app->response->statusCode = 401;//I preferred that error code
    }
            },

        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'rules' => [
                // ...
                'OPTIONS <path:.+>' => 'site/index',

                ['class' => 'yii\rest\UrlRule', 'controller' => 'mnus', 'prefix' => 'api', 'only' => ['delete', 'create', 'update', 'view', 'index']],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'category', 'prefix' => 'api', 'only' => ['delete', 'create', 'update', 'view', 'index']],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'page', 'prefix' => 'api', 'only' => ['delete', 'create', 'update', 'view', 'index']],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'gallery', 'prefix' => 'api', 'only' => ['delete', 'create', 'update', 'view', 'index']],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'galleryitem', 'prefix' => 'api', 'only' => ['delete', 'create', 'update', 'view', 'index']],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'persons', 'prefix' => 'api', 'only' => ['delete', 'create', 'update', 'view', 'index']],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'rsocials', 'prefix' => 'api', 'only' => ['delete', 'create', 'update', 'view', 'index']],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'meta', 'prefix' => 'api', 'only' => ['delete', 'create', 'update', 'view', 'index']],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'notifies', 'prefix' => 'api', 'only' => ['delete', 'create', 'update', 'view', 'index']],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'seo', 'prefix' => 'api', 'only' => ['delete', 'create', 'update', 'view', 'index']],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'marketing', 'prefix' => 'api', 'only' => ['delete', 'create', 'update', 'view', 'index']],
                'POST api/seodel' => 'seo/del',
                ['class' => 'yii\rest\UrlRule', 'controller' => 'subscribers', 'prefix' => 'api', 'only' => ['delete', 'create', 'update', 'view', 'index']],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'rss', 'patterns' => ['PUT,PATCH {id}' => 'update', 'DELETE {id}' => 'delete', 'GET,HEAD {id}' => 'view', 'POST' => 'create', 'GET,HEAD' => 'index', '{id}' => 'options', '' => 'options'], 'prefix' => 'api'],
                '/' => 'site/index',
                'login' => 'site/login',
                'logout' => 'site/logout',
                'test' => 'rarticles/test',
                'GET uploadold' => 'image/old',
                'POST api/gis' => 'galleryitem/sorting',
                'POST api/login' => 'page/apilog',
                'GET api/getuser' => 'user/get',
                'GET api/changepass' => 'user/changepass',
                'api/image_upload' => 'image/index',
                'GET api/recomended/<id>' => 'rarticles/recomended',
                'GET api/catSections/<id>' => 'rarticles/categories',
                'GET api/articleRss/<id>' => 'rarticles/rss',
                'POST api/articleRss/<id>' => 'rarticles/rssupdate',
                'POST api/recomended/<id>' => 'rarticles/recupdate',
                'POST api/catupdate/<id>' => 'rarticles/catupdate',

                "search/<query>" => 'articles/search',
                'articles/<url>/preview' => 'articles/preview',
                'tags/<id>/' => 'tags/view',
                'rss/<url>/' => 'site/rss',

                'page/<url>/' => 'p/view',
                ['class' => 'yii\rest\UrlRule', 'controller' => 'rsections', 'patterns' => ['PUT,PATCH {id}' => 'update', 'DELETE {id}' => 'delete', 'GET,HEAD {id}' => 'view', 'POST' => 'create', 'GET,HEAD' => 'index', '{id}' => 'options', '' => 'options'], 'prefix' => 'api'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'user', 'only' => ['delete', 'create', 'update', 'view', 'index'], 'prefix' => 'api'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'rtags', 'only' => ['delete', 'create', 'update', 'view', 'index'], 'prefix' => 'api'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'rarticles', 'only' => ['delete', 'create', 'update', 'view', 'index'], 'prefix' => 'api'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'pnews', 'only' => ['delete', 'create', 'update', 'view', 'index'], 'prefix' => 'api'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'isizes', 'only' => ['delete', 'create', 'update', 'view', 'index'], 'prefix' => 'api'],

                'sitemap.xml' => 'site/sitemap', //карта сайта
                'robots.txt' => 'site/robots', //карта сайта

                '<section>/<url>/' => 'articles/view',
                '<url>' => 'sections/view',

            ],
        ],
//        'urlManager' => [
//            'enablePrettyUrl' => true,
//            'showScriptName' => false,
//            'enableStrictParsing' => false,
//            'rules' => [
//            ],
//        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1','178.121.149.245'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1',  '178.121.149.245'],
    ];
}

return $config;
