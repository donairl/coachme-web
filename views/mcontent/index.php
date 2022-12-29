<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\MaDepartment;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MaContentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

if ($searchModel->post_type == 'V'){
    $this->title = 'Video';
} else {
    $this->title = 'Article';
}


$this->params['breadcrumbs'][] = $this->title;

$dataList = ArrayHelper::map(MaDepartment::find()->asArray()->all(), 'id', 'name');
?>

<div class="ma-product-index white-box page">

    <h1><?= Html::encode($this->title) ?></h1>
    <hr>
    <h3><?= Yii::t('app', 'Video') ?>
        <?= Html::dropDownList('dept_id', null, $dataList, ['id' => 'dept_id', 'prompt' => Yii::t('app', 'Silahkan Pilih...'), 'options' => [$searchModel->dept_id => ['selected' => true]]]) ?>
    </h3>
    <hr>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  
    <?php Pjax::begin(); ?>    
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'cat_name',
            'product_name',
            'short_description',
            'unit',
            'post_type',
            // 'price_unit',
            ['class' => 'yii\grid\ActionColumn'],
        // 'picture',
        // 'category_id',
        ],
    ]);
    ?>
    <p>
        <?= Html::a('<i class="far fa-plus-square"></i> '. Yii::t('app', 'Baru'), ['create'], ['class' => 'btn btn-success']) ?>
        <?//= Html::a('<i class="fas fa-file-alt"></i> '.Yii::t('app', 'Artikel Baru'), ['create','post_type'=>'A'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::end(); ?>

</div>

<?php
$xurl = Url::to(['video/index']);
$js = <<<JS

$('#dept_id').change(
   ()=>{
       var a = $('#dept_id').val();

       console.log(a);
       location.href= "$xurl?dept_id="+a;

   }

);

JS;

$this->registerJs($js);
?>