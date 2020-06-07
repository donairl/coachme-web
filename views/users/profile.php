<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaUsers */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="site-admin page w-75 mx-auto" style="min-height:680px">
<div class="ma-users-form white-box page">

    <?php $form = ActiveForm::begin([
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        'horizontalCssClasses' => [
            'label' => 'col-sm-4',
            'offset' => 'offset-sm-4',
            'wrapper' => 'col-sm-8',
            'error' => '',
            'hint' => '',
        ],
    ],
    ]); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true,'readonly'=>true]) ?>
    <div class="form-group row field-mausers-role ">
        <label class="col-sm-4" for="mausers-role">Tanggal Registrasi</label>
        <div class="col-sm-8">

             <? echo date("Y-m-d H:i:s", $model->created_at);?>
        </div>
    </div>
    <div class="form-group row field-mausers-role ">
        <label class="col-sm-4" for="mausers-role">Role</label>
        <div class="col-sm-8">

             <?=$model->role=='1'?'Admin':'Normal'?>
        </div>
    </div>  
    <?= $form->field($model, 'plain_password')->textInput(['maxlength' => true,'readonly'=>true]) ?>
    <?= $form->field($model, 'repeat_password')->textInput(['maxlength' => true,'readonly'=>true]) ?>
    
   <?//= $form->field($model, 'role')->dropdownlist(['1'=>'Admin','2'=>'Normal']) ?>
    <?//= $form->field($model, 'status')->dropdownlist(['1'=>'Active','0'=>'Inactived']) ?>

  



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
