<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Content;

/**
 * ContentSearch represents the model behind the search form about `app\models\Content`.
 */
class ContentSearch extends Content
{
	// myself
	public $listsql;
	// /myself
	
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'moderation', 'listsql_id', 'parent_id', 'grade_id'], 'integer'],
            [['title', 'additionalInformation'], 'safe'],
			/* other rules */
			[['listsql'], 'safe'],
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
        $query = Content::find();
		
		// myself
		$query->joinWith(['listsql']);
		// /myself

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
		
		// myself
		$dataProvider->sort->attributes['listsql'] = [
			// The tables are the ones our relation are configured to
			// in my case they are prefixed with "tbl_"
			'asc' => ['listsql.title' => SORT_ASC],
			'desc' => ['listsql.title' => SORT_DESC],
		];
		// /myself

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'moderation' => $this->moderation,
            'listsql_id' => $this->listsql_id,
            'parent_id' => $this->parent_id,
            'grade_id' => $this->grade_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'additionalInformation', $this->additionalInformation])
			// myself
				->andFilterWhere(['like', 'listsql.title', $this->listsql]);
			// /myself
			;
			
		/* // myself
		$query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'serialNumber', $this->serialNumber])
            ->andFilterWhere(['like', 'place', $this->place])
			->andFilterWhere(['like', 'userprofile.fio', $this->fio])
			->andFilterWhere(['like', 'userprofile.flat', $this->flat]);
		// /myself */

        return $dataProvider;
    }
}
