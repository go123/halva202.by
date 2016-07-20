<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Dicdescription;

/**
 * DicdescriptionSearch represents the model behind the search form about `app\models\Dicdescription`.
 */
class DicdescriptionSearch extends Dicdescription
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['titleOfView', 'titleRU', 'ru', 'titleEN', 'en', 'comment'], 'safe'],
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
        $query = Dicdescription::find();

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
        ]);

        $query->andFilterWhere(['like', 'titleOfView', $this->titleOfView])
            ->andFilterWhere(['like', 'titleRU', $this->titleRU])
            ->andFilterWhere(['like', 'ru', $this->ru])
            ->andFilterWhere(['like', 'titleEN', $this->titleEN])
            ->andFilterWhere(['like', 'en', $this->en])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
