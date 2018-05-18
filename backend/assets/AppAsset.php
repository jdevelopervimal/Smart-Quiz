<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $depends = [
								'yii\bootstrap\BootstrapAsset',
        'yii\web\YiiAsset',
    ];
    public $css = [
        'css/site.css',
        'css/multiselect.css',
        'css/jquery-ui.css',
        'css/dataTables.bootstrap.min.css',
        'css/style.css',
        'css/fa/css/font-awesome.min.css'
    ];
    public $js = [
            'js/validator.js',
            'js/jquery-ui.js',
            'js/bootstrap.validate.min.js',
            'js/jquery.dataTables.min.js',
            'js/dataTables.bootstrap.min.js',
            'plugin/editor/tiny_mce.js',
            'js/multiselect.js',
            'js/jquery.form.min.js',
            'js/js/highcharts.js',
            'js/js/modules/exporting.js',
            'js/custom.js',
    ];
}
