<?php
/**
 * Configuration adjustments for local installation of web application.
 */
return [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '3M94JcXHg42mJB96pwe7P0kAkVG5I9Hl',
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
