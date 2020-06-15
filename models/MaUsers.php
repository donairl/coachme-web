<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "ma_users".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $role
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class MaUsers extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $plain_password;
    public $repeat_password;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ma_users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email'], 'required'],
            [['role', 'status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email','plain_password','repeat_password'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [[ 'created_at', 'updated_at'],'safe']
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => 'created_at',
                    \yii\db\ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at',
                ],
                'value' => function() { return date('U'); // unix timestamp 
                },
            ],
        ];
    }
    
    public static function findIdentity($username)
    {
      return static::findOne(['username' => $username]);
	  
	  
    }

    public function validatePassword($vpassword) {
        return Yii::$app->security->validatePassword($vpassword, $this->password_hash);
    }
    
    public function setPassword($vpassword) {
        $this->password_hash = Yii::$app->security->generatePasswordHash($vpassword);
    }
    
    public static function findIdentityByAccessToken($token, $type = null)
    {
       // throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
       return static::findOne(['auth_key' => $token]);
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
	public function getId()
    {
        return $this->getPrimaryKey();
    }
     
    public function generateAuthKey() {
        $this->session_key = Yii::$app->security->generateRandomString();
    }
    
    public function getMaUsersExtra()
    {
        return $this->hasOne(MaUsersExtra::className(), ['username' => 'username']);
    }
    
    public function getCurrentClassName()
    {
        return MaDepartment::findOne($this->getMaUsersExtra()->one()->current_class)->name;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'email' => Yii::t('app', 'Email'),
            'role' => Yii::t('app', 'Role'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    
}
