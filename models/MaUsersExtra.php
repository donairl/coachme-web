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
            [[ 'username', 'bank_name', 'bank_acc_no', 'bank_acc_name'], 'required'],
            [['id'], 'integer'],
            [['username'], 'string', 'max' => 225],
            [['bank_name'], 'string', 'max' => 22],
            [['bank_acc_no'], 'string', 'max' => 32],
            [['bank_acc_name'], 'string', 'max' => 100],
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
            'bank_name' => Yii::t('app', 'Bank Name'),
            'bank_acc_no' => Yii::t('app', 'Bank Acc No'),
            'bank_acc_name' => Yii::t('app', 'Bank Acc Name'),
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
