<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RegisterForm */
/* @var $form ActiveForm */
/*
 */
?>
<div class="users-register mx-auto py-5" style="width: 720px;">
    <div class="card">

        <div class="card-body">
            <div class="card-title"><h2>Activation</h2></div>
            <?php
            $form = ActiveForm::begin([
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
            ]);
            ?>
            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <div class="form-group">
                *E-Mail kode aktivasi telah terkirim, mohon cek email anda dan masukkan kodenya dibawah ini 
            </div>     
                <?= $form->field($model, 'otp_code')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
            </div>
<?php ActiveForm::end(); ?>
        </div>
    </div>

</div><!-- users-register -->

<?php
$css = <<<CSS

.users-register{
 padding-top:40px;
 }

 #registerform-bank{
  width:40%;
  }   
CSS;

$this->registerCss($css);
?>
