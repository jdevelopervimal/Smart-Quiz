<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\DifficultLevel;

/**
 * DifficultLevelSearch represents the model behind the search form about `common\models\DifficultLevel`.
 */
class DifficultLevelSearch extends DifficultLevel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['did', 'institute_id'], 'integer'],
            [['level_name'], 'safe'],
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
        $query = DifficultLevel::find();

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
            'did' => $this->did,
            'institute_id' => $this->institute_id,
        ]);

        $query->andFilterWhere(['like', 'level_name', $this->level_name]);

        return $dataProvider;
    }
}
