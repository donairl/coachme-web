<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\MaDepartment;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MaCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Sub Kategori');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="ma-category-index page white-box">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['label'=>Yii::t('app', 'Kelas'),
            'attribute'=>'dept.name',
            'filter'=> Html::activeDropDownList($searchModel, 'dept_name',ArrayHelper::map(MaDepartment::find()->asArray()->all(), 'id', 'name'), ['class'=>'form-control','prompt' => 'Select Category']),
            ],
            'category_code',
           
            
            'category_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <p>
        <?= Html::a('<i class="far fa-plus-square"></i> '.Yii::t('app', 'Baru'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::end(); ?>
</div>

