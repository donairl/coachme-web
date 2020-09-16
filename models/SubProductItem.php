<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sub_product_item".
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $item_name
 * @property string $price
 *
 * @property MaContent $product
 */
class SubProductItem extends \yii\db\ActiveRecord
{
    public $product_name;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sub_product_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'item_name', 'price'], 'required'],
            [['product_id'], 'integer'],
            [['price'], 'number'],
            [['item_name'], 'string', 'max' => 100],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => MaContent::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'item_name' => Yii::t('app', 'Sub Item Name'),
            'product_name'=>Yii::t('app', 'Service/Product Name'),
            'price' => Yii::t('app', 'Price'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(MaContent::className(), ['id' => 'product_id']);
    }

   
}
