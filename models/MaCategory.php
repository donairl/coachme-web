<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ma_category".
 *
 * @property string $category_code
 * @property integer $dept_id
 * @property string $category_name
 *
 * @property MaDepartment $dept
 * @property MaContent[] $MaContents
 */
class MaCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ma_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_code', 'dept_id', 'category_name'], 'required'],
            [['dept_id'], 'integer'],
            [['category_code'], 'string', 'max' => 2],
            [['category_name'], 'string', 'max' => 50],
            [['dept_id'], 'exist', 'skipOnError' => true, 'targetClass' => MaDepartment::className(), 'targetAttribute' => ['dept_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_code' => Yii::t('app', 'SubKategori ID'),
            'dept_id' => Yii::t('app', 'Top Kategori'),
            'category_name' => Yii::t('app', 'Kategori'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDept()
    {

        return $this->hasOne(MaDepartment::className(), ['id' => 'dept_id']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaContents()
    {
        return $this->hasMany(MaContent::className(), ['category_id' => 'category_code']);
    }

    public function getCountproduct()
    {
        $count = Yii::$app->db->createCommand('SELECT COUNT(*) FROM ma_product WHERE category_id=:catid',
            [':catid' => $this->category_code])->queryScalar();

        return $count;

    }
}
