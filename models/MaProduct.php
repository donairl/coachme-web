<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "ma_product".
 *
 * @property integer $id
 * @property string $product_name
 * @property string $note
 * @property string $unit
 * @property string $price_unit
 * @property string $picture
 * @property string $category_id
 *
 * @property Cart[] $carts
 * @property MaCategory $category
 */
class MaProduct extends \yii\db\ActiveRecord
{
    public $attachment1;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ma_product';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_name', 'note', 'unit', 'price_unit', 'picture', 'category_id'], 'required'],
            [['attachment1'], 'file','extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png',],
            [['price_unit'], 'number'],
            [['dept_id'], 'integer'],
            [['product_name'], 'string', 'max' => 40],
            [['short_description'], 'string', 'max' => 80],
            [['note'], 'string'],
            [['unit'], 'string', 'max' => 12],
            [['picture'], 'string', 'max' => 60],
            [['category_id'], 'string', 'max' => 2],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => MaCategory::className(), 'targetAttribute' => ['category_id' => 'category_code']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'product_name' => Yii::t('app', 'Product/Service Name'),
            'note' => Yii::t('app', 'Note'),
            'unit' => Yii::t('app', 'Unit'),
            'price_unit' => Yii::t('app', 'Price Unit'),
            'picture' => Yii::t('app', 'Picture'),
            'category_id' => Yii::t('app', 'Category ID'),
            'cat_name' => Yii::t('app', 'Kategori'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(MaCategory::className(), ['category_code' => 'category_id']);
    }

    public function getCat_name(){

        return $this->getCategory()->one()->category_name;
    }

    public function beforeSave($insert){

        if (parent::beforeSave($insert)) {
            // Place your custom code here
            $session = Yii::$app->session;
            $this->dept_id=$session['dept_id'];

            $uploadedFile=UploadedFile::getInstance($this, 'attachment1');
            if($uploadedFile!=null && $uploadedFile->extension!='php'){
                $file_name="p_".$uploadedFile->baseName.".".$uploadedFile->extension;        
                $path=Yii::getAlias('@webroot/product')."/".$file_name;
                Yii::trace($path);
                $uploadedFile->saveAs($path);
                $this->picture=$file_name;
            }    
    
            return true;
        } else {
            return false;
        }
       
    }

 

}
