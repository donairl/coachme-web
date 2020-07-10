<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ma_users_extra".
 *
 * @property integer $id
 * @property string $username
 * @property string $bank_name
 * @property string $bank_acc_no
 * @property string $bank_acc_name
 *
 * @property MaUsers $username0
 */
class MaUsersExtra extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ma_users_extra';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'username'], 'required'],
            [['id','current_class'], 'integer'],
            [['username'], 'string', 'max' => 225],
            [['otp_activation','city','brandname','fbname','igname'], 'string'],
            [['username'], 'exist', 'skipOnError' => true, 'targetClass' => MaUsers::className(), 'targetAttribute' => ['username' => 'username']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
         
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsername0()
    {
        return $this->hasOne(MaUsers::className(), ['username' => 'username']);
    }
}
