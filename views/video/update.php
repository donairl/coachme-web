<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MaProduct */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
            'modelClass' => ($model->post_type=='V')?Yii::t('app', 'Video'):Yii::t('app', 'Artikel'),
        ]) . $model->product_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Video'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>

<div class="ma-product-update white-box page">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>

