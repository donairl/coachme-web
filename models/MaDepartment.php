<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ma_department".
 *
 * @property integer $id
 * @property string $name
 * @property string $menuicon
 *
 * @property MaCategory[] $maCategories
 */
class MaDepartment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ma_department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'menuicon'], 'required'],
            [['name', 'menuicon'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'menuicon' => Yii::t('app', 'Menuicon'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaCategories()
    {
        return $this->hasMany(MaCategory::className(), ['dept_id' => 'id']);
    }
}
