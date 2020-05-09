<?php

namespace app\models;

use Yii;
use yii\base\Model;

class RegisterForm extends Model
{
   
    public $real_name;
    public $email;
    public $username;
    public $password;
    public $retype_password;
    public $sex;
    public $bank;
    public $bank_account_no;
    public $bank_account_name;

    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password','retype_password','bank','bank_account_no','bank_account_name','email'], 'required'],
            [['real_name','sex'],'string'],
            ['retype_password','checksame'],
            ['email','email']
           
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
        $m->role=2;
        $m->created_at=date('U');
        $a= $m->save();

        if (!$a){
            Yii::trace($m->getErrors());
        }

        if ($a){
        $mx=new MaUsersExtra();
        $mx->username=$this->username;
        $mx->bank_name=$this->bank;
        $mx->bank_acc_no=$this->bank_account_no;
        $mx->bank_acc_name=$this->bank_account_name;
        $b=$mx->save();

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