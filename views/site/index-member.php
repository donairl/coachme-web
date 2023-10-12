<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Dashboard';
?>
<section class="page-section bg-primary" id="about">

    <div class="row justify-content-center">
        <div class="col-lg-12 text-center">
            <h2 class="text-white mt-0 h2-special">Selamat Datang</h2>
          
        </div>
    </div>

</section>

<div class="page white-box">
    <div class="row justify-content-center">
        <div class="col-lg-12 text-center">
            <h2>Video</h2>
            <hr class="divider dark">
        </div>
    </div>
    <div class="row">
        <?php
        foreach ($model as $r) {
            ?>
            <div class="col-lg-3 col-sm-12 menu-overlay">
                <div class="menu-icon">
                    <a href="<?= Url::to(['site/subindex', 'id' => $r->id]) ?>">
                        <img class="img-circle" src="<?= Url::to('@web/menuicon/' . $r->menuicon) ?>">
                    </a>
                </div>
                <div class="menu-text">
                    <h3>
                        <?= $r->name ?>
                    </h3>
                </div>
            </div>

            <?php
        }
        ?>

    </div>
</div>