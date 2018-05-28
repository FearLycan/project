<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/hamburgers.min.css',
        'css/animate.min.css',
        'fonts/font-awesome/css/font-awesome.min.css',
        'fonts/ionicons/css/ionicons.min.css',
        'css/styles.min.css',
        'css/easy-autocomplete.min.css',
        'css/easy-autocomplete.themes.min.css',
        'css/site.css',
    ];
    public $js = [
        'js/pace.min.js', //niebieski pasek pokazujący wczytywanie strony
        'js/popper.min.js',
        'js/bootstrap.min.js',
        'js/jquery.easing.js',
        'js/ie10-viewport-bug-workaround.js',
        'js/slidebar.js',
        'js/classie.js',
        'js/sticky-kit.min.js',
        'js/viewportchecker.min.js',
        ///'js/bootstrap-dropdown-hover.min.js',
        'js/boomerang.min.js',
        'js/jquery.easy-autocomplete.min.js',
        'js/site.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
