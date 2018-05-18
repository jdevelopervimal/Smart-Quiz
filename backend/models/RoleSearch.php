<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\User;

/**
 * RoleSearch represents the model behind the search form about `common\models\User`.
 */
class RoleSearch extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'institute_id', 'referrer', 'role_id', 'group_id', 'updated_by'], 'integer'],
            [['username', 'auth_key', 'password_hash', 'password_reset_token', 'email', 'status', 'first_name', 'last_name', 'profile_pic', 'date_of_birth', 'fathers_name', 'gender', 'marital_status', 'login_status', 'login_time', 'logout_time', 'otp_expire', 'membership', 'profile_status', 'created_at', 'updated_at'], 'safe'],
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
        $query = User::find();

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
            'id' => $this->id,
            'institute_id' => $this->institute_id,
            'referrer' => $this->referrer,
            'login_time' => $this->login_time,
            'logout_time' => $this->logout_time,
            'otp_expire' => $this->otp_expire,
            'role_id' => $this->role_id,
            'group_id' => $this->group_id,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'profile_pic', $this->profile_pic])
            ->andFilterWhere(['like', 'date_of_birth', $this->date_of_birth])
            ->andFilterWhere(['like', 'fathers_name', $this->fathers_name])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'marital_status', $this->marital_status])
            ->andFilterWhere(['like', 'login_status', $this->login_status])
            ->andFilterWhere(['like', 'membership', $this->membership])
            ->andFilterWhere(['like', 'profile_status', $this->profile_status]);

        return $dataProvider;
    }
}
