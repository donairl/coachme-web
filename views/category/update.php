<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MaCategory */

$this->title = Yii::t('app', 'Ubah Sub Kategori: {name}', [
            'name' => $model->category_name,
        ]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->category_code, 'url' => ['view', 'id' => $model->category_code]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>

<div class="ma-category-update page white-box">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>

