<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Quiz;

/**
 * QuizSearch represents the model behind the search form about `common\models\Quiz`.
 */
class QuizSearch extends Quiz
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quid', 'start_time', 'end_time', 'duration', 'test_type', 'view_answer', 'max_attempts', 'institute_id', 'qselect', 'camera_req', 'pract_test'], 'integer'],
            [['quiz_name', 'description', 'pass_percentage', 'credit', 'correct_score', 'incorrect_score', 'qids_static', 'ip_address'], 'safe'],
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
        $query = Quiz::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'quid' => $this->quid,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'duration' => $this->duration,
            'test_type' => $this->test_type,
            'view_answer' => $this->view_answer,
            'max_attempts' => $this->max_attempts,
            'institute_id' => $this->institute_id,
            'qselect' => $this->qselect,
            'camera_req' => $this->camera_req,
            'pract_test' => $this->pract_test,
        ]);

        $query->andFilterWhere(['like', 'quiz_name', $this->quiz_name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'pass_percentage', $this->pass_percentage])
            ->andFilterWhere(['like', 'credit', $this->credit])
            ->andFilterWhere(['like', 'correct_score', $this->correct_score])
            ->andFilterWhere(['like', 'incorrect_score', $this->incorrect_score])
            ->andFilterWhere(['like', 'qids_static', $this->qids_static])
            ->andFilterWhere(['like', 'ip_address', $this->ip_address]);

        return $dataProvider;
    }
}
