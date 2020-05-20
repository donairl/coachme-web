<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RegisterForm */
/* @var $form ActiveForm */

$listBank=['bca'=>'BCA - Bank Central Asia',
      'bri'=>'BRI - Bank Rakyat Indonesia',
      'bni'=>'BNI - Bank Nasional Indonesia',
      'mandiri'=>'Bank Mandiri','cimb'=>'CIMB'];
?>
<div class="users-register mx-auto py-5" style="width: 720px;">
<div class="card">

<div class="card-body">
  <div class="card-title"><h2>Register</h2></div>
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

        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'retype_password')->passwordInput() ?>
        <?= $form->field($model, 'real_name') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'sex')->radioList ( ['M'=>Yii::t('app','Pria'),'F'=>Yii::t('app','Wanita')] ) ?>
        <?= $form->field($model, 'bank')->dropDownList($listBank, 
						['prompt'=>'Select...']); ?>
        <?= $form->field($model, 'bank_account_no') ?>
        <?= $form->field($model, 'bank_account_name') ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
    </div>
</div>
 
</div><!-- users-register -->

<?php
$css=
<<<CSS

.users-register{
 padding-top:40px;
 }

 #registerform-bank{
  width:40%;
  }   
CSS;

$this->registerCss($css);
?>
