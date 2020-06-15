<?php
namespace app\assets;
use yii\web\AssetBundle;


/**
 * Description of FontawesomeAsset
 *
 * @author donny
 */
class FontawesomeAsset extends AssetBundle{
 //    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
     
    public $baseUrl = 'https://use.fontawesome.com/releases/v5.7.0/';
    public $css =[
        'css/all.css'
    ];
    
    /*
    public $baseUrl = 'http://assets.test/fa';
    public $css =[
        'css/all.css'
    ];
     
   */
}
