<?php

namespace app\models;

use Yii;
use yii\base\Model;

class RegisterForm extends Model {

    public $real_name;
    public $email;
    public $username;
    public $password;
    public $retype_password;
    public $sex;
    public $igname;
    public $fbname;
    public $brandname;
    public $address;
    public $city;

    /*
      public $brand_name;
      public $facebookUser;
      public $instagramUser;
      public $address;
      public $city;

     */
    public $phone_no;

    public function rules() {
        return [
            // username and password are both required
            [['username'], 'unique', 'skipOnError' => true,
                'targetClass' => MaUsers::className(),
                'targetAttribute' => ['username' => 'username'],
                'message' => 'username sudah digunakan, mohon entri yang lain'],
            [['username', 'password', 'retype_password', 'email', 'phone_no'], 'required'],
            [['real_name', 'sex','fbname','igname','address','city'], 'string'],
            ['retype_password', 'checksame'],
            ['email', 'email']
        ];
    }

    public function checksame($attribute, $params, $validator) {
        //
        if ($this->retype_password != $this->password) {

            $this->addError($attribute, 'Password is mismatch with Retype ');
        }
    }

    public function register() {
        if ($this->validate()) {
            $m = new MaUsers();
            $m->username = $this->username;
            $m->setPassword($this->password);
            $m->email = $this->email;
            $m->status = 0; // not activated
            $m->role = 2;
            $m->created_at = date('U');
            $a = $m->save();

            if (!$a) {
                Yii::trace($m->getErrors());
            }

            if ($a) {
                $mx = new MaUsersExtra();
                $mx->username = $this->username;
                $mx->phone_no = $this->phone_no;
                $mx->fbname = $this->fbname;
                $mx->igname = $this->igname;
                $mx->address = $this->address;
                $mx->city = $this->city;
                $mx->sex = $this->sex;
                $mx->otp_activation = strval(rand(1000, 9999));
                $b = $mx->save();

                if (!$b) {
                    Yii::trace($mx->getErrors());
                }

                if ($b) {
                    Yii::$app->mailer->compose('activation',
                                    ['otp_code' => $mx->otp_activation,
                                        'username' => $this->username,
                                        'password'=> $this->password,
                                        'phone_no'=>$this->phone_no,
                                        'realname' => $this->real_name]) // a view rendering result becomes the message body here
                            ->setFrom(Yii::$app->params['adminEmail'])
                            ->setTo($this->email)
                            ->setSubject('[CoachBisnisKuliner] Kode Aktivasi OTP')
                            ->send();
                }
            }

            return $a && $b;
        } else {
            return false;
        }
    }

    public function attributeLabels() {
        return [
            'real_name' => Yii::t('app', 'Nama Asli'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'brandname' => Yii::t('app', 'Nama Brand'),
            'fbname' => Yii::t('app', 'Facebook'),
            'igname' => Yii::t('app', 'Instagram'),
            'address' => Yii::t('app', 'Alamat'),
            'city' => Yii::t('app', 'Kota'),
        ];
    }

}
