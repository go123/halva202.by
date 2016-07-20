<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Linen;

/**
 * Line2Search represents the model behind the search form about `app\models\Line2`.
 */
class LinenSearch extends Linen
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'titleRu', 'titleEn', 'commentRu', 'commentEn'], 'safe'],
            [['idFloatOrder'], 'number'],
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
        // $query = Line2::find();
		$lineParentN_id = $_SESSION['lineParentN_id'];
		$query = Linen::find()->where(['lineParentN_id'=>$lineParentN_id, 'moderation'=>1])->orderBy('id desc');

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
            'idFloatOrder' => $this->idFloatOrder,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'titleRu', $this->titleRu])
            ->andFilterWhere(['like', 'titleEn', $this->titleEn])
            ->andFilterWhere(['like', 'commentRu', $this->commentRu])
            ->andFilterWhere(['like', 'commentEn', $this->commentEn]);

        return $dataProvider;
    }
}
