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

    


    <div class="info-box">
    <h1><?= Html::encode($this->title) ?></h1>
        <p>
            <?= Html::a('<i class="far fa-edit"></i> '.Yii::t('app', 'Edit'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?=
            Html::a('<i class="far fa-trash-alt"></i> '.Yii::t('app', 'Hapus'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Yakin anda mau menghapus ?'),
                    'method' => 'post',
                ],
            ])
            ?>
        <?= Html::a('<i class="fas fa-undo-alt"></i> '.Yii::t('app', 'Kembali'), ['index', 'id' => $model->id], ['class' => 'btn btn-grey']) ?>
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
