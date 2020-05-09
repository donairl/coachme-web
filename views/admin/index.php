
<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Admin Menu';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-admin page">
    <div class="row">

            <div class="col-lg-11 info-box">
                 <h2 class="title-info">
                        <?= Html::encode($this->title) ?>
                        <hr>
                    </h2>
             
                   
                   
                    <div class="row">
                     <div class="col-lg-4 col-sm-12">
                     <?= Html::a('<span class="glyphicon glyphicon-user"></span> User', ['users/index'], ['class' => 'btn-lg btn-primary']) ?>
                     </div>
                     <div class="col-lg-4 col-sm-12">
                     <?= Html::a('<span class="glyphicon glyphicon-tags"></span> Video Content', ['product/index'], ['class' => 'btn-lg btn-primary']) ?>
                     </div>
                    
                     <div class="col-lg-4 col-sm-12">
                     <?= Html::a('<span class="glyphicon glyphicon-wrench"></span> Kategori', ['department/index'], ['class' => 'btn-lg btn-primary']) ?>
                     </div>

                    </div> 
                    <div class="row">
                    <div class="col-lg-4 col-sm-12">&nbsp;</div>
                    </div>
                    
                    <div class="row">
                     <div class="col-lg-4">
                     <?= Html::a('<span class="glyphicon glyphicon-user"></span> Sub Kategori', ['category/index'], ['class' => 'btn-lg btn-primary']) ?>
                     </div>
                     <div class="col-lg-4">
                     <?= Html::a('<span class="glyphicon glyphicon-tags"></span> Payment', ['product/index'], ['class' => 'btn-lg btn-primary']) ?>
                     </div>
                    
                     <div class="col-lg-4">
                     <?= Html::a('<span class="glyphicon glyphicon-heart"></span> Maintenance Data', ['users/profile'], ['class' => 'btn-lg btn-primary']) ?>
                     </div>
                    </div> 

                              
                </div>
    </div>
</div>

<?
$url=Url::to("@web/background/bg1.jpg");

$css= <<<CSS

.site-admin .btn-lg {
    width:240px;
    display: inline-block;
}
.site-admin .info-box {
  background-image:  url("$url");
  background-repeat:  repeat;
}
CSS;

$this->registerCss($css);
?>