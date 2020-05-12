<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MaProduct */

$this->title = Yii::t('app', 'Buat Video');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ma Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ma-product-create white-box page">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
