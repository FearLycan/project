<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';
// use composer classmap to increase autoloading performance
//Yii::$classMap = require __DIR__ . '/../vendor/composer/autoload_classmap.php';

$config = require __DIR__ . '/../config/web.php';
//$config = yii\helpers\ArrayHelper::merge(
//    require __DIR__ . '/../config/web.php',
//    require __DIR__ . '/../config/web-local.php'
//);

(new yii\web\Application($config))->run();
