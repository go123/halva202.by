<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Result;

/**
 * ResultSearch represents the model behind the search form about `app\models\Result`.
 */
class ResultSearch extends Result
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'moderation', 'listsql_id', 'parent_id', 'grade_id', 'mark_TutorAboutPupil1', 'mark_Pupil1AboutTutor', 'markMaximum_TutorAboutPupil1', 'markMaximum_Pupil1AboutTutor', 'mark_Pupil1AboutPupil1', 'markMaximum_Pupil1AboutPupil1'], 'integer'],
            [['title', 'comment_TutorAboutPupil1', 'date_TutorAboutPupil1', 'comment_Pupil1AboutTutor', 'date_Pupil1AboutTutor', 'commentMaximum_TutorAboutPupil1', 'dateMaximum_TutorAboutPupil1', 'commentMaximum_Pupil1AboutTutor', 'dateMaximum_Pupil1AboutTutor', 'comment_Pupil1AboutPupil1', 'date_Pupil1AboutPupil1', 'commentMaximum_Pupil1AboutPupil1', 'dateMaximum_Pupil1AboutPupil1'], 'safe'],
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
        $query = Result::find();

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
            'moderation' => $this->moderation,
            'listsql_id' => $this->listsql_id,
            'parent_id' => $this->parent_id,
            'grade_id' => $this->grade_id,
            'mark_TutorAboutPupil1' => $this->mark_TutorAboutPupil1,
            'date_TutorAboutPupil1' => $this->date_TutorAboutPupil1,
            'mark_Pupil1AboutTutor' => $this->mark_Pupil1AboutTutor,
            'date_Pupil1AboutTutor' => $this->date_Pupil1AboutTutor,
            'markMaximum_TutorAboutPupil1' => $this->markMaximum_TutorAboutPupil1,
            'dateMaximum_TutorAboutPupil1' => $this->dateMaximum_TutorAboutPupil1,
            'markMaximum_Pupil1AboutTutor' => $this->markMaximum_Pupil1AboutTutor,
            'dateMaximum_Pupil1AboutTutor' => $this->dateMaximum_Pupil1AboutTutor,
            'mark_Pupil1AboutPupil1' => $this->mark_Pupil1AboutPupil1,
            'date_Pupil1AboutPupil1' => $this->date_Pupil1AboutPupil1,
            'markMaximum_Pupil1AboutPupil1' => $this->markMaximum_Pupil1AboutPupil1,
            'dateMaximum_Pupil1AboutPupil1' => $this->dateMaximum_Pupil1AboutPupil1,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'comment_TutorAboutPupil1', $this->comment_TutorAboutPupil1])
            ->andFilterWhere(['like', 'comment_Pupil1AboutTutor', $this->comment_Pupil1AboutTutor])
            ->andFilterWhere(['like', 'commentMaximum_TutorAboutPupil1', $this->commentMaximum_TutorAboutPupil1])
            ->andFilterWhere(['like', 'commentMaximum_Pupil1AboutTutor', $this->commentMaximum_Pupil1AboutTutor])
            ->andFilterWhere(['like', 'comment_Pupil1AboutPupil1', $this->comment_Pupil1AboutPupil1])
            ->andFilterWhere(['like', 'commentMaximum_Pupil1AboutPupil1', $this->commentMaximum_Pupil1AboutPupil1]);

        return $dataProvider;
    }
}
