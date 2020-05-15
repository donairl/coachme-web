<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\MaProduct */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ma Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ma-product-view white-box page">

<div class="row col-lg-12 title-form">
    <h2><?= Html::encode($model->product_name) ?></h2>
</div>

<hr>
<p>

<div class="row">
<div class="col-lg-8 col-md-8">
<?=$model->embed_url;?>

<!--
<img src="<?//=Url::to('@web/product/'.$model->picture)?>">
-->
</div>
<div class="col-lg-4 col-md-4">
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
