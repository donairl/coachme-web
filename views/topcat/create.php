<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MaDepartment */

$this->title = Yii::t('app', 'Kategori Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ma Departments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="ma-department-create white-box page">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

