<?php
/**
 * Configuration adjustments for 'prod' environment of web application.
 */
return [
    'components' => [
        'log' => [
            'targets' => [
                'main-log' => [
                    'except' => [
                        'yii\web\HttpException:404',
                        'yii\web\HttpException:403',
                    ],
                ],
            ],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => true,
            'transport' => [
                'class' => '',
                'host' => '',
                'username' => '',
                'password' => '',
                'port' => '',
                'encryption' => '',
            ],
        ],
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\admin',
        ],
    ],
];
