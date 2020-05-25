<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\MaProduct */

$this->title = $model->product_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-admin page w-75 mx-auto" style="min-height:680px">
<div class="ma-product-view white-box page">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Sub Item'), ['subitem', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
          <?= Html::a(Yii::t('app', 'Kembali'), ['index', 'dept_id' => 1], ['class' => 'btn btn-default']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'category_id',
            'product_name',
            'note:html',
            'unit',
            'price_unit',
            'picture',
          
        ],
    ]) ?>
    <!--
    <hr>
    <h2>Sub Item</h2>
    <hr>
    -->
    <?
    /*
    GridView::widget([
        'dataProvider' => $dpchild,
      
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'item_name',
            'price'
          
          
        ],
    ]);
    */
    ?>
</div>
</div>
