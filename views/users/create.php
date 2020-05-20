<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MaUsers */

$this->title = Yii::t('app', 'Pengguna Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pengguna'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ma-users-create pt-4 page">
<div class=" white-box w-75 mx-auto page">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
</div>
