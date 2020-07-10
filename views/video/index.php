<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\MaDepartment;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MaProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Konten Editor';
$this->params['breadcrumbs'][] = $this->title;

$dataList = ArrayHelper::map(MaDepartment::find()->asArray()->all(), 'id', 'name');
?>

<div class="ma-product-index white-box page">

    <h1><?= Html::encode($this->title) ?></h1>
    <hr>
    <h3><?= Yii::t('app', 'Kategori') ?>
        <?= Html::dropDownList('dept_id', null, $dataList, ['id' => 'dept_id', 'prompt' => Yii::t('app', 'Silahkan Pilih...'), 'options' => [$searchModel->dept_id => ['selected' => true]]]) ?>
    </h3>
    <hr>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="fas fa-film"></i> '. Yii::t('app', 'Video Baru'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('<i class="fas fa-file-alt"></i> '.Yii::t('app', 'Artikel Baru'), ['create','post_type'=>'A'], ['class' => 'btn btn-success']) ?>
    </p>
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
    <?php Pjax::end(); ?>

</div>

<?php
$xurl = Url::to(['product/index']);
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