<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MaCategory */

$this->title = Yii::t('app', 'Buat Kategori');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kategori'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-admin page w-75 mx-auto" style="min-height:680px">
<div class="ma-category-create page white-box">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
