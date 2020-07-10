<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $model->product_name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about page">

    
    <div class="row">

    <div class="col-lg-12 p-3">
      <div class="info-box p-4">
        <h1><?=$this->title?></h1>
        <hr>
        <p class="lead">
        </p>
         <?=$model->note?>
        <p>
          <a class="btn btn-lg btn-success" href="<?=Url::to(['site/index'])?>">Kembali</a>
        </p>
        
      </div>

      </div>


</div>
