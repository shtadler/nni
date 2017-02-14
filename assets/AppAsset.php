<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/site.css',
        'css/main.css',
        'css/font-awesome.min.css',
    ];
    public $js = [
        'js/bootstrap.min.js',
        'js/html5shiv.js',
        'js/respond.min.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
