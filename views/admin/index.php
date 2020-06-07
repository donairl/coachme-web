
<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Quick Menu';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row">
    <div class="col-4">
        <div class="white-box padding-20">
            <h3 class="box-title">Member Baru</h3>
            <ul class="list-inline two-part">
                <li><i class="fa fa-user text-purple"></i></li>
                <li class="text-right"><span class="counter">2369</span></li>
            </ul>
        </div>
    </div>
    <div class="col-4">
        <div class="white-box padding-20">
            <h3 class="box-title">Video</h3>
            <ul class="list-inline two-part">
                <li><i class="fa fa-film text-success"></i></li>
                <li class="text-right"><span class="counter">15</span></li>
            </ul>
        </div>
    </div>
    <div class="col-4">
        <div class="white-box padding-20">
            <h3 class="box-title">Jumlah Tonton</h3>
            <ul class="list-inline two-part">
                <li><i class="fa fa-bell text-primary"></i></li>
                <li class="text-right"><span class="counter">169</span></li>
            </ul>
        </div>
    </div>
</div>

<div class="row site-admin">

    <div class="col-lg-12 info-box">
        <h2 class="title-info mx-auto">
            <?= Html::encode($this->title) ?>
            <hr>
        </h2>



        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <?= Html::a('<i class="fas fa-user-tie"></i> User', ['users/index'], ['class' => 'btn-lg btn-primary']) ?>
            </div>
            <div class="col-lg-4 col-sm-12">
                <?= Html::a('<i class="fas fa-film"></i> Video Content', ['video/index'], ['class' => 'btn-lg btn-primary']) ?>
            </div>

            <div class="col-lg-4 col-sm-12">
                <?= Html::a('<i class="fas fa-paperclip"></i> Kelas', ['topcat/index'], ['class' => 'btn-lg btn-primary']) ?>
            </div>

        </div> 
        <div class="row">
            <div class="col-lg-4 col-sm-12">&nbsp;</div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <?= Html::a('<i class="fas fa-tasks"></i> Sub Kategori', ['category/index'], ['class' => 'btn-lg btn-primary']) ?>
            </div>
            <div class="col-lg-4">
                <?= Html::a('<i class="fas fa-tools"></i> Other Setup', ['product/index'], ['class' => 'btn-lg btn-primary']) ?>
            </div>

            <div class="col-lg-4">
                <?= Html::a('<i class="fas fa-inbox"></i> Profile', ['users/profile'], ['class' => 'btn-lg btn-primary']) ?>

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