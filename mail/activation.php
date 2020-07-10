<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\BaseMessage instance of newly created mail message */
?>

<h1>Kode aktivasi Web Coach Me</h1>
<hr>
Dear <?= $realname ?>,
<p>Selamat bergabung, Kode aktivasi anda adalah <?= $otp_code ?>, Dibawah adalah informatsi anda</p>
<table>
    <tr>
        <td>Username : </td>
        <td><?=$username?></td>
    </tr>
    <tr>
        <td>Password : </td>
        <td><?=$password ?></td>
    </tr>
    <tr>
        <td>No HP : </td>
        <td><?=$phone_no ?></td>
    </tr>
    <tr>
        <td>Kode Aktivasi : </td>
        <td><?= $otp_code ?></td>
    </tr>
</table>
<p>Untuk mengaktivasi account anda silahkan kunjungi halaman <? Url::to(['/users/activation','uid'=>$username],true)?> <br> Atau click 
    <?= Html::a('disini', Url::to(['/users/activation', 'uid' => $username], true)) ?><br>
   Anda disarankan mengganti password anda setelah login demi keamanan login anda. 
</p> 
<hr>
<p><small>Pesan E-mail ini adalah otomatis dikirim dari coachbisniskuliner.com, jangan di reply<br>
        E-mail ini terkirim karena anda mendaftarkan diri di website kami.<br>
        Silahkan hubungi admin@coachbisniskuliner.com apabila ada kesulitan.
    </small></p>
