<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "purchase".
 *
 * @property integer $id
 * @property string $user_id
 * @property integer $quiz_id
 * @property integer $transaction_id
 * @property string $transaction_status
 * @property integer $mode
 * @property integer $ammount
 * @property string $created_on
 *
 * @property Quiz $quiz
 * @property User $user
 */
class Purchase extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'purchase';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['user_id', 'quiz_id', 'transaction_status', 'ammount', 'created_on'], 'required'],
            [['transaction_status'], 'string'],
            [['created_on'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'quiz_id' => 'Quiz ID',
            'transaction_id' => 'Transaction ID',
            'transaction_status' => 'Transaction Status',
            'mode' => 'Mode',
            'ammount' => 'Ammount',
            'created_on' => 'Created On',
            'json_data' => 'Json Data',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuiz() {
        return $this->hasOne(Quiz::className(), ['quid' => 'quiz_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    public static function getDetailedTransaction(){
        $connection = \Yii::$app->db;
        $sql = 'select pu.id, u.username, ug.group_name,qu.quiz_name,pu.transaction_id, pu.transaction_status,pu.mode, pu.ammount, pu.created_on,pu.json_data from 
                purchase pu 
                left join user u on pu.user_id = u.id
                left join user_group ug on u.group_id = ug.gid
                left join quiz qu on qu.quid = pu.quiz_id';
        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
        return $data;
    }
     public static function getTransaction($status,$start,$end){
        $connection = \Yii::$app->db;
        
        $sql = 'select pu.id, u.username, ug.group_name,qu.quiz_name,pu.transaction_id, pu.transaction_status,pu.mode, pu.ammount, pu.created_on,pu.json_data from 
                purchase pu 
                left join user u on pu.user_id = u.id
                left join user_group ug on u.group_id = ug.gid
                left join quiz qu on qu.quid = pu.quiz_id';
        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
        return $data;
    }
}


