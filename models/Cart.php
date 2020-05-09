<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cart".
 *
 * @property integer $cart_id
 * @property integer $product_id
 * @property integer $qty
 * @property string $username
 *
 * @property MaUsers $username0
 * @property MaProduct $product
 */
class Cart extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cart';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'qty', 'username'], 'required'],
            [['product_id', 'qty'], 'integer'],
            [['username'], 'string', 'max' => 255],
            [['username'], 'exist', 'skipOnError' => true, 'targetClass' => MaUsers::className(), 'targetAttribute' => ['username' => 'username']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => MaProduct::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cart_id' => Yii::t('app', 'Cart ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'qty' => Yii::t('app', 'Qty'),
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(MaProduct::className(), ['id' => 'product_id']);
    }
}
