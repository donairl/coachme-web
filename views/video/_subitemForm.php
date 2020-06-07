<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SubProductItem */
/* @var $form ActiveForm */
?>
<div class="subitemForm page">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'product_name')->textInput(['readOnly'=>true,'value'=>$model_parent->product_name]) ?>
        <?= $form->field($model, 'item_name') ?>
        <?= $form->field($model, 'price') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- _subitemForm -->
