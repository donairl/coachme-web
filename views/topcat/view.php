<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MaDepartment */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kategori'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="ma-department-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <div class="info-box">
        <p>
            <?= Html::a(Yii::t('app', 'Edit'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?=
            Html::a(Yii::t('app', 'Hapus'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Yakin anda mau menghapus ?'),
                    'method' => 'post',
                ],
            ])
            ?>
        <?= Html::a(Yii::t('app', 'Kembali'), ['index', 'id' => $model->id], ['class' => 'btn btn-grey']) ?>
        </p>
        <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                // 'id',
                'sort_no',
                'name',
                'note:html',
                'menuicon',
            ],
        ])
        ?>
    </div>
</div>
