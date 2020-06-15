<?php
use yii\helpers\Url;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h1>Konfirmasi Pembayaran</h1>
<hr>

<div class="row">
    <div class="col-12 text-center">
        <h4>Kode Transaksi : <i><?= $model->invoice_no?></i></h4>
        <hr>
        Rp. <?= number_format($model->total_paid,2) ?>
        <br>
        
        Terima kasih atas pembayaran anda. <br>
        System akan memproses pembayaran anda selama 24x1 jam.<br>
        Mohon hubungi : 0818000000 bila ada kesulitan. <br>
        <a href="<?=Url::to(['site/index']);?>" class="btn btn-primary">Kembali</a> 
    </div>       
</div>     

