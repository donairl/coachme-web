<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\MaProduct */

$this->title = $model->short_description;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Video'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ma-product-view white-box page">

<div class="row col-lg-12 title-form">
    <h2><?= Html::encode($model->product_name) ?></h2>
</div>

<hr>
<p>

<div class="row">
<div class="col-lg-12">
<div class="video-section">
<?=$model->embed_url;?>
</div>
<!--
<img src="<?//=Url::to('@web/product/'.$model->picture)?>">
-->
</div>
</div>

<div class="row">
<div class="col-lg-12">
<p>
<?
echo $model->note;
?>
 </p>
 </div>
</div>

<p>
    <?
    /*
    = DetailView::widget([
        'model' => $model,
        'attributes' => [
          
            'product_name',
            'short_description',
            'unit',
            'price_unit',
            'picture',
           
        ],
    ])
    */
    ?>
</p>
<!--
<p class="buy-section"><button  class="btn btn-danger buythis" data-prdid="<?=$buy_url=Url::to(['product/addtocart','prdid'=>$r->id]);?>"> 
<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>&nbsp;Beli</button> </p>
    -->
</div>
<?php
$css=
<<<CSS

@media screen and (min-width: 1024px) {
.ma-product-view {
    
        margin-left: 8%;
        margin-right: 8%;
  
}

.video-section {
  width: 50%;
  margin: 0 auto;
  background-color:black;
}

}

CSS;

$this->registerCss($css);

?>