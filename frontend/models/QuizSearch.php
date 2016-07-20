<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Quiz;

/**
 * QuizSearch represents the model behind the search form about `app\models\Quiz`.
 */
class QuizSearch extends Quiz
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['question', 'answer1', 'answer2', 'answer3', 'answer4'], 'safe'],
            [['queue'], 'number'],
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
        $query = Quiz::find()->orderBy('queue');

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
            'queue' => $this->queue,
        ]);

        $query->andFilterWhere(['like', 'question', $this->question])
            ->andFilterWhere(['like', 'answer1', $this->answer1])
            ->andFilterWhere(['like', 'answer2', $this->answer2])
            ->andFilterWhere(['like', 'answer3', $this->answer3])
            ->andFilterWhere(['like', 'answer4', $this->answer4]);

        return $dataProvider;
    }
}
