<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-login page pt-4">
    <?php if (Yii::$app->session->hasFlash('notif')): ?>
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <h4><i class="icon fa fa-check"></i>Notification</h4>
            <?= Yii::$app->session->getFlash('notif') ?>
        </div>
    <?php endif; ?>
    <div class="row">

        <div class="col-lg-12">
            <div class="info-box">
                <h2 class="title-form">
                    <?= Html::encode($this->title) ?>
                </h2>
                <hr>
                <?php
                $form = ActiveForm::begin([
                            'id' => 'login-form',
                            'options' => ['class' => 'needs-validation', 'novalidate' => true],
                            'layout' => 'horizontal',
                            'fieldConfig' => [
                                'template' => "{label}\n<div class=\"col-lg-10\">{input}</div>\n<div class=\"col-lg-12\">{error}</div>",
                                'labelOptions' => ['class' => 'col-lg-2 control-label'],
                            ],
                ]);
                ?>



                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'rememberMe')->checkbox(); ?>

            

                <div class="col-lg-offset-1" style="color:#999;">
                    <?= Yii::t('app', 'Username dan password  sensitif case'); ?> <br>
                    <?= Yii::t('app', 'Belum punya akaun silahkan register'); ?><br>
                    <?= Yii::t('app', 'Bila sudah register tapi belum aktivasi, silahkan aktivasi dulu'); ?><br>
                    <br>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-lg-3">
                        <?= Html::submitButton('<i class="fas fa-sign-in-alt"></i> Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                    <div class=" col-lg-3">
                        <?= Html::a('<i class="far fa-address-book"></i> Register', ['users/register'], ['class' => 'btn btn-success', 'name' => 'login-button']) ?>
                    </div>
                    <div class=" col-lg-3">
                        <?= Html::a('<i class="fas fa-door-open"></i> Aktivasi', ['users/activation'], ['class' => 'btn btn-success', 'name' => 'login-button']) ?>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>
<?php
$css = <<<CSS

@media screen and (min-width: 1024px) {
.site-login{
    
        margin-left: 22%;
        margin-right:22%;
  
}
}


CSS;

$this->registerCss($css);
?>