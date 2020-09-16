<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MaContent;

/**
 * MaContentSearch represents the model behind the search form about `app\models\MaContent`.
 */
class MaContentSearch extends MaContent
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','dept_id'], 'integer'],
            [['product_name', 'note', 'unit', 'picture', 'category_id'], 'safe'],
            [['price_unit'], 'number'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = MaContent::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        //var_dump($this->dept_id);
        //die();

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'dept_id' =>$this->dept_id,
            'price_unit' => $this->price_unit,
        ]);

        $query->andFilterWhere(['like', 'product_name', $this->product_name])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'unit', $this->unit])
            ->andFilterWhere(['like', 'picture', $this->picture])
            ->andFilterWhere(['like', 'category_id', $this->category_id]);

        return $dataProvider;
    }
}
