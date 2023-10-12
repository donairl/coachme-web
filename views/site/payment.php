<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Url;
?>
<div class="page white-box text-center">
    <h1>Upgrade kelas anda</h1>
    <hr>
    <div class="row">
        <div class="col-12">
            <h3>Anda sekarang di kelas : <?= Yii::$app->user->identity->currentClassName ?></h3>
            <p>&nbsp;</p>
        </div>
    </div>
    <div class="row">

        <?php
        foreach ($model as $r) {
            ?>
            <div class="col-lg-3 col-sm-12">
                <div class="menu-overlay-buy text-center">
                    <div class="menu-icon">

                        <img class="img-circle" src="<?= Url::to('@web/menuicon/' . $r->menuicon) ?>">

                    </div>
                    <div class="menu-text">
                        <h3>
                            <?= $r->name ?>
                        </h3>
                        <?php if ($r->price > 0){ ?>
                        <p class="buy-section"><button class="btn btn-danger buythis"
                                                       data-prdid="<?= Url::to(['site/payment2nd', 'id' => $r->id]); ?>">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Beli</button> </p>
                        <?php } ?>
                    </div>
                </div>
                <div class="note text-left" style="min-height: 160px">

                    <?= $r->note ?>
                  

                </div>
                  <div class="text-center">
                        <strong>Rp <?= number_format($r->price, 2) ?></strong>
                    </div>
            </div>

            <?php
        }
        ?>

    </div>
</div>
<?php
$js = <<<JS
  $('.buythis').click(
    function(){
      var url=$(this).data('prdid');
      window.location.assign(url);  
       
    }
  );
JS;

$this->registerJs($js);

?>
