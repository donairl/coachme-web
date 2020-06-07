<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\BaseMessage instance of newly created mail message */

?>
<h1>Kode aktivasi Web Coach Me</h1>
<hr>
<p>Kode aktivasi anda adalah <?=$otp_code?></p>
<p>Kunjungi halaman <?=Url::home('http').'/users/activation'?> </p> 
<?= Html::a('Halaman Aktifasi', Url::home('http').'/users/activation' ) ?>
<hr>
<p><small>Pesan E-mail ini adalah otomatis, jangan di reply</small></p>