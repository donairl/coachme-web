<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = Yii::t('app', 'Payment List');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="ma-category-index page white-box">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'invoice_no',
            'username',
            'total_paid',
            'type_payment',
            [
            'label'=>'Aksi',
            'format'=> 'html',    
            'value' => function ($data) {
                $btn = Html::a('<i class="fas fa-paperclip"></i> Konfirm', ['admin/listpo','confirmId'=>$data->id], ['class' => 'btn-lg btn-primary']);
                return $btn;
            },
        ],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>
</div>
