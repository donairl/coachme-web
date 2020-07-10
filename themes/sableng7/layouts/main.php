<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\ThemeAsset;
use app\models\MaCategory;

ThemeAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

        <?= Html::csrfMetaTags() ?>
        <title>
            <?= Html::encode($this->title) ?>
        </title>
        <?php $this->head() ?>
    </head>

    <body>
        <?php $this->beginBody() ?>
        <?php
        $mnuNormal = [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Register', 'url' => ['/users/register']],
            ['label' => 'About', 'url' => ['/page/about']],
        ];


        if (!\Yii::$app->user->isGuest && \Yii::$app->user->identity->role == 1) {

            $menuAdm = [['label' => 'Admin', 'url' => ['/admin/index']]];
            $mnuNormal = array_merge($mnuNormal, $menuAdm);
        }

        if (\Yii::$app->user->isGuest) {

            $menuAdd = [['label' => 'Login', 'url' => ['/users/login']]];
            $mnuNormal = array_merge($mnuNormal, $menuAdd);
        } else {
            $menuAdd = [
                ['label' => 'Logout (' . Yii::$app->user->identity->username . ')', 'url' => ['/users/logout']]
            ];

            if (\Yii::$app->user->identity->role == 2) {
                $mnuNormal = array_merge($mnuNormal, [['label' => 'Upgrade', 'url' => ['/page/upgrade']]]);
            }
            $mnuNormal = array_merge($mnuNormal, $menuAdd);
        }

        NavBar::begin(['brandLabel' => 'Coach Me', 'options' => ['class' => 'navbar-expand-lg navbar-dark bg-dark']]);
        echo Nav::widget([
            'items' => $mnuNormal
            ,
            'options' => ['class' => 'navbar-nav'],
        ]);
        NavBar::end();
        ?>
        <?php if (Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'index') { ?>    
            <div class="container-fluid top-app">
                <h1 class="title-app"><?= Yii::$app->params['title-app'] ?></h1>
                <h3 class="title-app"><?= Yii::$app->params['subtitle-app'] ?></h3>
                <p><?= Yii::$app->params['description-app'] ?></p>

            </div>
            <? }  ?>


            <div class="container-fluid p-0">
    <?= $content ?>
            </div>



            <!--stop -->
            <footer class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">  
                            <ul>
                                <li><?=Html::a('Terms and Condition',['page/tnc'])?></li>
                                <li><?=Html::a('Privacy Policy',['page/privacy'])?></li>
                                <li><?=Html::a('Copyright Information',['page/privacy'])?></li>
                                <li><?=Html::a('Contact Us',['site/contact'])?></li>
                            </ul>
                        </div>
                        <div class="col-lg-4">  
                            <ul>
                                <li><?=Html::a('Network Status',['page/status'])?></li>
                                <li><?=Html::a('Site Map',['page/sitemap'])?></li>
                            </ul>

                        </div>
                        <div class="col-lg-4">  
                            <ul>
                                <li><?=Html::a('About',['page/about'])?></li>
                                <li><?=Html::a('Register',['users/register'])?></li>
                            </ul>

                        </div>

                    </div>


                    <p class="text-center">&copy; QSpot Studio
    <?= date('Y') ?>
                    </p>


                </div>
            </footer>

    <?php $this->endBody() ?>
        </body>

    </html>
    <?php $this->endPage() ?>