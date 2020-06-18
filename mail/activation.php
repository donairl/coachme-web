<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\BaseMessage instance of newly created mail message */
?>

<h1>Kode aktivasi Web Coach Me</h1>
<hr>
Dear <?= $realname ?>,
<p>Selamat bergabung, Kode aktivasi anda adalah <?= $otp_code ?></p>
<p>Kunjungi halaman <? Url::to(['/users/activation','uid'=>$username],true)?> <br> Atau click 
    <?= Html::a('disini', Url::to(['/users/activation', 'uid' => $username], true)) ?>
</p> 
<hr>
<p><small>Pesan E-mail ini adalah otomatis, jangan di reply</small></p>