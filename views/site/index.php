<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Sableng7 Theme';
?>
<section class="page-section bg-primary" id="about">

    <div class="row justify-content-center">
        <div class="col-lg-12 text-center">
            <h2 class="text-white mt-0 h2-special">Mulai sekarang juga</h2>
            <hr class="divider light my-4">
            <p class="text-white-50 mb-4">Minimalkan resiko bisnis anda</p>
            <iframe width="853" height="480" src="https://www.youtube.com/embed/ea9dpmjqDzU?autoplay=0&modestbranding=1"
                    frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            <br>
            <a class="btn btn-dark" href="/users/register">Gabung Sekarang</a>
        </div>
    </div>

</section>
<div class="page white-box">
    <div class="row justify-content-center">
        <div class="col-lg-12 text-center">
            <h2>Kelas</h2>
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
                <h2 class="text-white mt-0 h2-special">Free Download Mobile Apps</h2>
                <hr class="divider light my-4">
                <span style="font-size: 64px; color: Dodgerblue;">
                    <i class="far fa-bell"></i>
                </span>
                <p class="text-white-50 mb-4 font-weight-bold" style="font-size: 32px">Coming soon!</p>
                <a class="btn btn-dark btn-lg" href="#services"><i class="far fa-comment-alt"></i> Get News Updates</a>
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
                <p class="text-muted mb-5">Ready to start your next project with us? Give us a call or send us an email
                    and we will get back to you as soon as possible!</p>

                <p class="text-muted mb-5">Ready to start your next project with us? Give us a call or send us an email
                    and we will get back to you as soon as possible!</p>

            </div>
            <div class="col-lg-6 text-center">
                <svg class="svg-inline--fa fa-envelope fa-w-16 fa-3x mb-3 text-muted" aria-hidden="true"
                     focusable="false" data-prefix="fas" data-icon="envelope" role="img"
                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                <path fill="currentColor"
                      d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z">
                </path>
                </svg>
                <p>donairlbox@yahoo.com</p>
            </div>
            <div class="col-lg-6 text-center">
                <svg class="svg-inline--fa fa-phone fa-w-16 fa-3x mb-3 text-muted" aria-hidden="true" focusable="false"
                     data-prefix="fas" data-icon="phone" role="img" xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 512 512" data-fa-i2svg="">
                <path fill="currentColor"
                      d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z">
                </path>
                </svg>
                <p>+628780000102</p>
            </div>
        </div>
    </div>
</section>