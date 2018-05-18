<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    /* public $css = [
      'css/fa/css/font-awesome.min.css',
      'css/bootstrap.validate.min.css',
      'css/site.css',
      'css/dataTables.bootstrap.min.css',
      'css/style.css',
      ];
      public $js = [
      'js/jquery-ui.min.js',
      'js/bootstrap.min.js',
      'js/validator.js',
      'js/bootstrap.validate.min.js',
      'js/jquery.dataTables.min.js',
      'js/dataTables.bootstrap.min.js',
      'js/canvasjs.min.js',
      'js/custom.js',
      ]; */
    public $css = [
        'frontend/web/css/fa/css/font-awesome.min.css',
        'frontend/web/css/bootstrap.validate.min.css',
        'frontend/web/css/site.css',
        'frontend/web/css/dataTables.bootstrap.min.css',
        'frontend/web/css/style.css',
    ];
    public $js = [
        'frontend/web/js/jquery-ui.min.js',
        'frontend/web/js/bootstrap.min.js',
        'frontend/web/js/validator.js',
        'frontend/web/js/bootstrap.validate.min.js',
        'frontend/web/js/jquery.dataTables.min.js',
        'frontend/web/js/dataTables.bootstrap.min.js',
       // 'frontend/web/js/canvasjs.min.js',
        'frontend/web/js/js/highcharts.js',
        'frontend/web/js/js/modules/exporting.js',
        'frontend/web/js/custom.js',
    ];

}
