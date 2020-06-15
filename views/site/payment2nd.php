<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Url;
?>
<div class="page white-box text-center" id="payment">
    <h1>Pilihan Pembayaran</h1>
    <hr>

    <div class="row">
        <div class="col-lg-9 col-sm-12">
            <div class="row">
                <div class="col-lg-4">
                    <img src="/images/btr.jpg" class="img-fluid" style="height:120px"><br><br>
                    <input type="radio" name="paymethod" value="BTR" class="form-control" checked="true">
                    <label for="btr">Bank Transfer</label>  
                </div>
                <div class="col-lg-4">
                    <img src="/images/ovo.jpg" class="img-fluid" style="height:120px"><br><br>
                    <input type="radio" name="paymethod" value="OVO" class="form-control">
                    <label for="ovo">OVO</label>  
                </div>
                <div class="col-lg-4">
                    <img src="/images/gopay.jpg" class="img-fluid" style="height:120px"><br><br>
                    <input type="radio" name="paymethod" value="GOPAY" class="form-control">
                    <label for="gopay">GoPay</label>  
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h4>Payment Info</h4>
                    <hr>
                    <div id="info-screen-BTR" >
                        <h5>Mohon transfer di Rekening berikut</h5>
                        <p>
                            Bank BCA<br>
                            No Account: 0014-1000-333040<br>
                            A/N : PT Kuliner Sejati
                        </p>
                    </div>
                    <div id="info-screen-OVO">
                        <h5>Scan OVO Barcode</h5>
                        <img src="/images/ovo-qr.png" class="img-fluid" style="height:420px"><br><br>
                    </div>
                    <div id="info-screen-GOPAY">
                        <h5>Scan GOPAY Barcode</h5>
                        <img src="/images/gopay-qr.png" class="img-fluid" style="height:420px"><br><br>

                    </div>
                    <br>
                    Yang Harus dibayar : <br><strong>Rp <?= number_format($model->price, 2) ?></strong>
                    <input type="hidden" name="selectClass" id="selectClass" value="<?= $model->id ?>"><br>
                    <button id="btnConfirm" class="btn btn-primary">Konfirmasi</button>
                </div>

            </div>



        </div>


        <div class="col-lg-3 col-sm-12">
            <h4>Pilihan Kelas:</h4>
            <hr>
            <p><strong>Rp <?= number_format($model->price, 2) ?></strong></p>
            <div class="menu-overlay-buy text-center ">
                <div class="menu-icon">

                    <img class="img-circle" src="<?= Url::to('@web/menuicon/' . $model->menuicon) ?>">

                </div>
                <div class="menu-text">
                    <h3>
                        <?= $model->name ?>
                    </h3>

                </div>
            </div>






        </div>



    </div>
</div>

<?php
$js = <<<JS
        
 
    $('#info-screen-OVO').hide();
    $('#info-screen-GOPAY').hide();
        
    $("input[type='radio']").click(function(){
            var radioValue = $("input[name='paymethod']:checked").val();
         $('#info-screen-BTR').hide();
    $('#info-screen-OVO').hide();
    $('#info-screen-GOPAY').hide();
            if(radioValue){
                  $('#info-screen-' + radioValue).show();
            }
        });
        
    $('#btnConfirm').click(()=>{
         var radioValue = $("input[name='paymethod']:checked").val();
         var vselectClass = $('#selectClass').val();
         var valCsrf = yii.getCsrfToken()
         
         $.post('/site/payfinal',{paymethod: radioValue, payForClass: vselectClass,_csrf: valCsrf })
          .done((resp)=>{ $('#payment').html(resp)});
        
    });    
        
JS;

$this->registerJs($js);
?>