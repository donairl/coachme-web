<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\ThemeAsset;
use app\assets\FontawesomeAsset;

ThemeAsset::register($this);
FontawesomeAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       <!--
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        -->        
                    
        <?= Html::csrfMetaTags() ?>
        <title>
            <?= Html::encode($this->title) ?>
        </title>
        <?php $this->head() ?>
    </head>

    <body>
        <?php $this->beginBody() ?>

        <div class="head">
            <?php
            NavBar::begin([
                'brandLabel' => Yii::$app->name,
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-expand-lg navbar-dark bg-dark',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Home', 'url' => ['/admin/index']],
                    ['label' => 'About', 'url' => ['/page/about']],
                    ['label' => 'Contact', 'url' => ['/site/contact']],
                    Yii::$app->user->isGuest ? (
                            ['label' => 'Login', 'url' => ['/users/login']]
                            ) : ['label' => 'Logout', 'url' => ['/users/logout'],
                        'data' => [
                            'confirm' => Yii::t('app', 'Apa anda yakin logout'),
                            'method' => 'post',
                        ]]
                /*
                  (
                  '<li class="nav-item">'
                  . Html::beginForm(['/users/logout'], 'post')
                  . Html::submitButton(
                  'Logout (' . Yii::$app->user->identity->username . ')',
                  ['class' => 'btn btn-link logout']
                  )
                  . Html::endForm()
                  . '</li>'
                  )
                 */
                ],
            ]);
            NavBar::end();
            ?>
        </div>

        <div class="container-fluid bg-wallpaper p-0">
            <div class="row">
                <div class="col-md-2 side-menu  d-none d-lg-block">

                    <div class="white-box">
                        <div class="title-side"><i class="fas fa-bars"></i> Navigasi</div>
                        <ul class="nav">
                            <li>
                                <?= Html::a('<i class="fas fa-user-tie"></i> Dashboard', ['admin/index'], ['class' => '']) ?>
                            </li>
                            <li>
                                <?= Html::a('<i class="fas fa-film"></i> Konten', ['video/index'], ['class' => '']) ?>
                            </li>
                            <li>
                                <?= Html::a('<i class="fas fa-user-tie"></i> User', ['users/index'], ['class' => '']) ?>
                            </li>
                            <li>
                                <?= Html::a('<i class="fas fa-tasks"></i> Kategori', ['category/index'], ['class' => '']) ?>

                            </li>
                            <li>
                                <?= Html::a('<i class="fas fa-paperclip"></i> Kelas', ['topcat/index'], ['class' => '']) ?>

                            </li>
                            <li>
                                <?= Html::a('<i class="fas fa-inbox"></i> Profile', ['users/profile'], ['class' => '']) ?>

                            </li>
                       </ul>
                    </div>
                </div>
                <div class="col-12 col-lg-10">
                    <div class="page w-80 mx-auto" style="min-height:680px">
                        <?= $content ?>
                    </div>
                </div>

            </div>
        </div>


        <footer class="footer">
            <div class="container p-0">
                <p class="pull-left">&copy; QSpot Studio
                    <?= date('Y') ?>
                </p>
                <p class="pull-right">
                    <?=Html::a('Copyright Information',['page/privacy'])?>
                </p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>

</html>
<?php $this->endPage() ?>