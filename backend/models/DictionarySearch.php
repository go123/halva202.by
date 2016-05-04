<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Dictionary;

/**
 * DictionarySearch represents the model behind the search form about `app\models\Dictionary`.
 */
class DictionarySearch extends Dictionary
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['field', 'title', 'titleEN', 'description', 'descriptionEN', 'link', 'linkEN', 'addInfo'], 'safe'],
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
        $query = Dictionary::find();

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

        $query->andFilterWhere(['like', 'field', $this->field])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'titleEN', $this->titleEN])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'descriptionEN', $this->descriptionEN])
            ->andFilterWhere(['like', 'link', $this->link])
            ->andFilterWhere(['like', 'linkEN', $this->linkEN])
            ->andFilterWhere(['like', 'addInfo', $this->addInfo]);

        return $dataProvider;
    }
}
