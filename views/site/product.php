<?php

/* @var $this yii\web\View */
use yii\helpers\Url;

//if (Yii::$app->)
?>

<div class="product">
<div class="row">
<?
if (count($model)<1){

    echo "Tidak ada Data";

} else 
foreach($model as $r){
?>
<div class="col-lg-4">
    <div class="col-prd" style="height:540px">
        <p class="title"><?=$r->product_name?></p>
        <a href="<?=Url::to(['product/detail','id'=>$r->id])?>">
         <? if ($r->picture!='') { ?>
        
            <img src="<?=Url::to('@web/product/'.$r->picture)?>">
         <? } else { ?>
             <img src="<?=Url::to('@web/product/play.jpg')?>">
           
        <? } ?>
        </a>
        <p class="desc"><?=$r->short_description?>  </p>
        <p class="price">Rp <?=number_format($r->price_unit,2)?>/<?=$r->unit?></p>
        <!--
        <p class="buy-section"><button class="btn btn-danger buythis"
                data-prdid="<?=$buy_url=Url::to(['product/addtocart','prdid'=>$r->id]);?>">
                <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>&nbsp;View</button> </p>
        -->          
       <p class="mb-1"><i class="far fa-play-circle" style="font-size:24px"></i></p>
    </div>

</div>

<?
}
?>
</div>
</div>
<?php 
$css=
<<<CSS

.col-prd img {
  

    width:200px;
    height:200px;
    margin-left:20px;
    border-radius:12px;
    -webkit-transition: .5s ease;
    -moz-transition: .5s ease;
    transition: .5s ease;
}

.col-prd:hover img {
  
    opacity:0.6;
    
    transform: scale(1.1);
}

.col-prd .title{
    font-family: 'Lobster Two', cursive;
    font-size:16px;
    text-align:center;
  
}

.col-prd {
  background-color:white;
  border: 1px solid #ccc;
  margin-top:8px;
  border-radius:16px;
  padding:14px 16px;
}

.col-prd .price {

 color: #ff4444;
 padding: 8px;

}    
.col-prd .desc {


 padding: 16px 8px;
 
} 

p.buy-section {
    text-align: center;
}
CSS;

$this->registerCss($css);


?>