<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Coach Bisnis Kuliner';
?>
<section class="page-section bg-primary" id="about">

    <div class="row justify-content-center">
        <div class="col-lg-12 text-center">
            <h2 class="text-white mt-0 h2-special">Merdeka dari rasa kuatir gagal</h2>
            <hr class="divider light my-4">
            <p class="text-white-50 mb-4">Resiko bisnis adalah wajar</p>
            <div class="view-video">
            <!--
            <iframe class="youtube" src="https://www.youtube.com/embed/eMf1TYxT1Ic?autoplay=0&modestbranding=1"
                    frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            -->        
            </div><br>
            <a class="btn-lg btn-dark" href="/users/register"><i class="fas fa-user-edit"></i>Klik disini</a>
        </div>
    </div>

</section>
<div class="page white-box">
    <div class="row justify-content-center">
        <div class="col-lg-12 text-center">
            <h2>Kategori</h2>
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
<section class="page-section bg-primary" id="about">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <h2 class="text-white mt-0 h2-special">Social Media Feed</h2>
                <hr class="divider light my-4">
                <span style="font-size: 64px; color: Dodgerblue;">
                    <i class="far fa-bell"></i>
                </span>
                <p class="text-white-50 mb-4 font-weight-bold" style="font-size: 32px">Social media kami lagi diupdate</p>
                <a class="btn btn-dark btn-lg" href="#services"><i class="fab fa-instagram"></i></a>
                 <a class="btn btn-dark btn-lg" href="#services"><i class="fab fa-facebook"></i></a>
            </div>
        </div>
    </div>
</section>

</div>
<section class="page-section" id="about">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <h2 class="text-dark mt-0 h2-special">Let Us get in touch</h2>
                <hr class="divider light my-4">
                <p class="text-muted mb-5">Jangan diam saja segera action</p>

                <p class="text-muted mb-5">Ready to start with us?  Send us an email
                    and we will get back to you as soon as possible!</p>

            </div>
            <div class="col-lg-6 text-center">
                <i class="fas fa-envelope  fa-w-16 fa-7x mb-3 text-primary"></i>
                <p>admin@coachbisniskuliner.com</p>
            </div>
            <div class="col-lg-6 text-center">
                <i class="fab fa-whatsapp  fa-w-16 fa-7x mb-3 text-success"></i>
                <p><a href="wa.me/6287840806191">+62878000000</a></p>
            </div>
        </div>
    </div>
</section>