<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

use \yii\web\Request;

$baseUrl = str_replace('/frontend/web', '', (new Request)->getBaseUrl());
return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'dateFormat' => 'php:d-M-Y',
            'datetimeFormat' => 'php:d-M-Y H:i:s',
            'timeFormat' => 'php:H:i:s',
        ],
        'urlManager' => [
            'baseUrl' => $baseUrl,
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'site/index',
                'login' => 'site/login',
                'logout' => 'site/logout',
                'complete-profile' => 'site/completeprofile',
                'profile' => 'profile/index',
                'quiz' => 'quiz/index',
                'assignments' => 'profile/assignments',
                'video-classes' => 'profile/videoclass',
                'study-material' => 'profile/studymaterial',
                'settings' => 'profile/settings',
                'access-quiz/<id:\d+>' => 'quiz/access',
                'inbox' => 'profile/inbox',
                'saveques' => 'quiz/saveques',
                'getquiz' => 'quiz/getquiz',
                'test' => 'quiz/test',
                'quiz-info/<id:\d+>' => 'quiz/quizinfo',
                'results' => 'quiz/results',
                'all-results' => 'profile/results',
                'result-summery/<id:\d+>' => 'profile/summery',
                'checkusername' => 'profile/checkusername',
                'purchase/<id:\d+>' => 'purchase/purchase',
                'payu' => 'purchase/payu',
                'pausuccess' => 'purchase/pausuccess',
                'paufailed' => 'purchase/paufailed',
            ],
        ],
    ],
    'params' => $params,
];
