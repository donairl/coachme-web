<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use app\models\MaCategory;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\MaProduct */
/* @var $form yii\widgets\ActiveForm */
$session = Yii::$app->session;
$list=ArrayHelper::map(MaCategory::find()->where(['dept_id'=>$session['dept_id']])->all(), 'category_code', 'category_name');
    
  
?>

<div class="ma-product-form page">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'category_id')->dropDownList($list,['prompt'=>Yii::t('app','Please Select...') ]); ?>
    
    <?= $form->field($model, 'product_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'short_description')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'embed_url')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'unit')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'price_unit')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'picture')->textInput(['maxlength' => true]) 
     if (!$model->isNewRecord) {
    
    ?>
        <div class="form-group">
            <img src="<?=Url::to('@web/product/'.$model->picture)?>">   
        </div>
     <?  } ?>
    
    <?= $form->field($model, 'attachment1')->fileInput(); ?>

    <?= $form->field($model, 'note')->widget(CKEditor::className(), [
                    'options' => ['rows' => 10,'id' =>'myckeditor'],
                    'preset' => 'full',
                ]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Back'), ['index', 'dept_id' => 1], ['class' => 'btn btn-dark']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
