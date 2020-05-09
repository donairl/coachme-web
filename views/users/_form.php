<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaUsers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ma-users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'role')->dropdownlist(['1'=>'Admin','2'=>'Contributor']) ?>
    <?= $form->field($model, 'status')->dropdownlist(['1'=>'Active','0'=>'Inactived']) ?>

  

    <?//= $form->field($model, 'created_at')->textInput() ?>

    <?//= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
