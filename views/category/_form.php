<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\MaDepartment;

/* @var $this yii\web\View */
/* @var $model app\models\MaCategory */
/* @var $form yii\widgets\ActiveForm */

$list=ArrayHelper::map(MaDepartment::find()->asArray()->all(), 'id', 'name');
?>

<div class="ma-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dept_id')->dropDownList($list,['prompt'=>Yii::t('app','Please Select...') ]); ?>

    <?= $form->field($model, 'category_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
