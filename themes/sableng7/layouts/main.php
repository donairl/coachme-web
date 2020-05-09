<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
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
    <?= Html::csrfMetaTags() ?>
      <title>
        <?= Html::encode($this->title) ?>
      </title>
      <?php $this->head() ?>
  </head>

<body>
<?php $this->beginBody() ?>
<nav class="head navbar navbar-default " data-spy="affix" data-offset-top="520">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
            aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?=Yii::$app->name?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active">
              <a href="<?=Url::home()?>">Home</a>
            </li>
            <?php
            if (!\Yii::$app->user->isGuest && \Yii::$app->user->identity->role==1) {
              echo  '<li><a href="'.Url::to(['admin/index']).'">Admin Menu</a></li>';
            }
           ?>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  Category
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                <? 
                $mcategory=MaCategory::find()->orderBy('category_name')->all();

               // if (!$mcategory) 
                foreach($mcategory as $r){ 
                     $xurl=Url::to(['site/product','catid'=>$r->category_code]);
                 ?>
                  <li>
                    
                    <a href="#" data-url="<?=$xurl?>" class="cat-list"><?=$r->category_name?>&nbsp;<span class="badge"><?=$r->countproduct?></span></a>
                  </li>
                <? } ?>
                </ul>
              </li>
              <li>
                <a href="<?=Url::to(['site/contact'])?>">Contact</a>
              </li>
              <li>
                <a href="<?=Url::to(['site/about'])?>">About</a>
              </li>
            
            <?php if (Yii::$app->user->isGuest){  ?>
              <li>
                <a href="<?=Url::to(['users/login'])?>">Login</a>
                
              </li>
              <li>
                <a href="<?=Url::to(['users/register'])?>">Register</a>
              </li>
            <?php } else { ?>

              <li>
                <a href="<?=Url::to(['product/viewcart'])?>">My Cart</a>
              </li> 
              <li>
                <a href="<?=Url::to(['users/logout'])?>">Logout (<?=Yii::$app->user->identity->username?>)</a>
              </li>

            <?php } ?>
          </ul>
          <ul class="nav navbar-nav navbar-right">

            <li></li>
          </ul>
        </div>
        <!--/.nav-collapse -->
      </div>
    </nav>
<div class="container-fluid top-app">
  <h1 class="title-app"><?=Yii::$app->params['title-app']?></h1>
  <h3 class="title-app"><?=Yii::$app->params['subtitle-app']?></h3>
  <p><?=Yii::$app->params['description-app']?></p>

</div>



<div class="container-wide">
      <?=$content ?>
</div>
    
    <!--stop -->
    <footer class="footer">
      <div class="container">
        <div class="row">
            <div class="col-lg-4">  
               <ul>
                <li>Legal</li>
                 <li>Terms and Condition</li>
                 <li>Privacy Policy</li>
                 <li>Copyright Information</li>
                 <li>Contact Us</li>
                </ul>
             </div>
             <div class="col-lg-4">  
             <ul>
                 <li>Help Desk</li>
                 <li>Site Map</li>
                 <li>Status</li>
              </ul>
                 
             </div>
             <div class="col-lg-4">  
             <ul>
                 <li>Support</li>
                 <li>Client</li>
              </ul>
                 
             </div>
             
        </div>
        

        <p class="text-center">&copy; Sableng9
          <?= date('Y') ?>
        </p>

      
      </div>
    </footer>

    <?php $this->endBody() ?>
  </body>

  </html>
  <?php $this->endPage() ?>