<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    
    <div class="row">

    <div class="col-lg-6">
      <div class="info-box">
        <h1>Need Login ?</h1>
        <hr>
        <p class="lead">
        </p>
           Silahkan anda registrasi dulu, anda akan mendapatkan login untuk mulai menjual.
           Ketentuan akan mengikat anda dengan peraturan yang ketat. Tapi jangan menyerah itulah hidup.
           Kalau anda ingin sukses dunia dan akhirat, anda harus berjuang dengan keras.
           Hidup tanpa perjuangan itu seperti makan nasi tanpa lauk.
           OK Jelas ? Pokoknya daftar dulu ya.
        <p>
          <a class="btn btn-lg btn-success" href="<?=Url::to(['users/register'])?>">Register</a>
        </p>
        
      </div>

      </div>

      <div class="col-lg-6">
      <div class="info-box">
        <h1>See Product?</h1>
        <hr>
        <p class="lead">
        </p>
          Ada beberapa produk yang dijual dengan beberapa ragam kategori. Anda ingin apa ? Bila belum ada tunggu saja 
          akan ada barang yang membuat anda senang.
          Beberapa produk akan kami tambahkan dalam jangka waktu yang singkat bila anda sabar menunggu.
          Kesabaran anda adalah bahan bakar motivasi kami untuk memberikan produk yang terbaik dan yang dibutuhkan.

        <p>
          <a class="btn btn-lg btn-success" href="<?=Url::to(['users/register'])?>">Product</a>
        </p>
        
      </div>
</div>
