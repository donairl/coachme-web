<?php

namespace app\models;

use Yii;
use yii\base\Model;

class ActivationForm extends Model
{
   
 
 
    public $username;
    public $password;
    public $otp_code;

    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password','otp_code'], 'required'],
         
           
        ];
    }

    public function checksame($attribute, $params, $validator)
    {
        //
        if ($this->retype_password!=$this->password){

            $this->addError($attribute,'Password is mismatch with Retype ');
        }
    }
    
    public function register()
    {
        if ($this->validate()){
            $m=new MaUsers();
            $m->username=$this->username;
            $m->setPassword($this->password);
            $m->email=$this->email;
            $m->status=0; // not activated
            $m->role=2;
            $m->created_at=date('U');
            $a= $m->save();

        if (!$a){
            Yii::trace($m->getErrors());
        }

        if ($a){
            $mx=new MaUsersExtra();
            $mx->username=$this->username;
            $mx->phone_no = $this->phone_no;
            $mx->otp_activation = rand(1000,9999);
            $b=$mx->save();
            
            Yii::$app->mailer->compose('activation',['otp_code'=>$mx->otp_activation,'username'=>$this->username]) // a view rendering result becomes the message body here
            ->setFrom(Yii::$app->params['adminEmail'])
            ->setTo($this->email)
            ->setSubject('[Coach-Me] Kode Aktivasi OTP')
            ->send();


        }

        return $a || $b;
        }
        else {
            return false;
        }
    }

    public function attributeLabels()
    {
        return [
            'real_name' => Yii::t('app', 'Nama Asli'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            
        ];
    }
}