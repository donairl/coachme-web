<?php

namespace app\models;

use Yii;
use yii\base\Model;

class ActivationForm extends Model {

    public $username;
    public $password;
    public $otp_code;
    private $_user = false;

    public function rules() {
        return [
            // username and password are both required
            [['username', 'password', 'otp_code'], 'required'],
            ['password', 'validatePassword'],
            ['otp_code', 'validateOtp'],
        ];
    }

    public function validatePassword($attribute, $params) {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Username atau password Salah.');
            } 
        }
    }

    public function validateOtp($attribute, $params) {
        if (!$this->hasErrors()) {
             $user = $this->getUser();

            if (!$user || !$user->maUsersExtra->otp_activation == $this->otp_code) {
                $this->addError($attribute, 'Kode OTP Salah.');
            }
            
        }
    }

    public function activation() {
        if ($this->validate()){
          
          $this->_user->status=1;
          $this->_user->save();
          return true;  
          
        } else {
          return false;    
        }
        
    }

    public function attributeLabels() {
        return [
            'otp_code' => Yii::t('app', 'Kode OTP'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
        ];
    }

    public function getUser() {
        if ($this->_user === false) {
            $this->_user = MaUsers::findIdentity($this->username);
        }

        return $this->_user;
    }

}
