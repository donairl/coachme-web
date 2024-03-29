<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MaDepartmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Kelas');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="ma-department-index page white-box">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
           // 'sort_no',
            'name',
            'menuicon',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
      <p>
        <?= Html::a('<i class="far fa-plus-square"></i>&nbsp;'.Yii::t('app', 'Baru'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::end(); ?></div>

