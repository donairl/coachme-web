<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MaContent */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
<div class="col-lg-6 col-lg-offset-3 col-sm-12">
<div class="info-box">

<table class="table table-bordered">
<thead>
<tr> 
<th>Product Name</th>
<th  class="text-center">Qty</th>
<th>Price/Unit</th>
<th>Subtotal</th>
</tr>
</thead>

<tbody>
<? foreach($model as $v){ 
$subtot= $v->qty* $v->product->price_unit;  
$tot+=$subtot;

?>
<tr> 
<td><?=$v->product->product_name?></td>
<td class="text-right">  
<?= Html::a(Yii::t('app', '+'), ['product/cart'], ['class' => 'btn btn-danger']) ?>
&nbsp;<?=$v->qty?>&nbsp;
<?= Html::a(Yii::t('app', '-'), ['product/cart'], ['class' => 'btn btn-danger']) ?>

</td>
<td class="text-right"><?=$v->product->price_unit?></td>
<td class="text-right"><?=$subtot?></td>
</tr>


<? } ?>
<tr> 

<td colspan="3"></td>
<td style="border-top: solid 3px black" class="text-right"><?=$tot?></td>
</tr>
</tbody>

</table>

<p  class="text-right">
        <?= Html::a(Yii::t('app', 'Continue'), ['site/index'], ['class' => 'btn btn-primary']) ?>
       
        <?= Html::a(Yii::t('app', 'Checkout'), ['payment/checkout'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
</div>
</div>