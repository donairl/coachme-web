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
class ThemeAsset extends AssetBundle
{
   // public $basePath = '@app/themes/sableng9';
    //public $baseUrl = '@web/themes/sableng9';
    public $sourcePath = '@app/themes/sableng7'; 

    public $css = [
        'css/sableng7.css',
       
    ];
    
    public $js = [
        'js/main.js'
    ];
    
    public $publishOptions = [
        'only' => [
            'fonts/*',
            'css/*',
            'js/*',
        ]
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
        'yii\bootstrap5\BootstrapPluginAsset',
    ];
}
