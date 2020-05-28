<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MaDepartment */

$this->title = Yii::t('app', 'Ubah {modelClass}: ', [
    'modelClass' => 'Kategori',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kategori'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="page w-75 mx-auto" style="min-height:680px">
<div class="ma-department-update page white-box">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
