<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\MaDepartment */
/* @var $form yii\widgets\ActiveForm */

$files=\yii\helpers\FileHelper::findFiles("./menuicon",['only'=>['*.jpg','*.png']]);

$olah= function($v){

    $t=explode('\\',$v)[1];

    return ['files'=>$t];
};

$m = array_map($olah,$files);

$list=ArrayHelper::map($m,'files','files');
//var_dump($list);
?>

<div class="ma-department-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'menuicon')->dropDownList($list,['prompt'=>Yii::t('app','Please Select...') ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
