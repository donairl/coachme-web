<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MaCategory */

$this->title = $model->category_code;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ma Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="ma-category-view page white-box">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->category_code], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-dark']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->category_code], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'category_code',
            'dept_id',
            'category_name',
        ],
    ]) ?>

</div>

