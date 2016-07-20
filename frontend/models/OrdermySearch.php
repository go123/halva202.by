<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ordermy;

/**
 * OrdermySearch represents the model behind the search form about `app\models\Ordermy`.
 */
class OrdermySearch extends Ordermy
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'web', 'phys', 'math', 'chem', 'go', 'many'], 'integer'],
            [['email', 'comment'], 'safe'],
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
        $query = Ordermy::find();

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
            'id' => $this->id,
            'web' => $this->web,
            'phys' => $this->phys,
            'math' => $this->math,
            'chem' => $this->chem,
            'go' => $this->go,
            'many' => $this->many,
        ]);

        $query->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
