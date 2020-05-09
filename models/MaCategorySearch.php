<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MaCategory;

/**
 * MaCategorySearch represents the model behind the search form of `app\models\MaCategory`.
 */
class MaCategorySearch extends MaCategory
{
    /**
     * {@inheritdoc}
     */
    public $dept_name;

    public function rules()
    {
        return [
            [['category_code', 'category_name','dept_name'], 'safe'],
            [['dept_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = MaCategory::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'dept_id' => $this->dept_id,
        ]);

        $query->andFilterWhere(['like', 'category_code', $this->category_code])
            ->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['dept_id'=>$this->dept_name]);

        return $dataProvider;
    }
}
