<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaction".
 *
 * @property int $id
 * @property string $invoice_no
 * @property int $username
 * @property string $total_paid
 * @property int $status_payment
 * @property string $type_payment
 * @property int $paid_for_class
 */
class Transaction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['invoice_no', 'username', 'total_paid', 'status_payment', 'type_payment'], 'required'],
            [['status_payment', 'paid_for_class'], 'default', 'value' => null],
            [[ 'status_payment', 'paid_for_class'], 'integer'],
            [['total_paid'], 'number'],
            [['invoice_no'], 'string', 'max' => 60],
            [['type_payment'], 'string', 'max' => 16],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'invoice_no' => 'Invoice No',
            'username' => 'Username',
            'total_paid' => 'Total Paid',
            'status_payment' => 'Status Payment',
            'type_payment' => 'Type Payment',
            'paid_for_class' => 'Paid For Class',
        ];
    }
}
