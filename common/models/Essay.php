<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%essay_qsn}}".
 *
 * @property integer $essay_id
 * @property integer $q_id
 * @property integer $r_id
 * @property string $essay_cont
 * @property integer $essay_score
 * @property integer $essay_status
 * @property integer $q_type
 */
class Essay extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%essay_qsn}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['q_id', 'r_id', 'essay_cont'], 'required'],
            [['q_id', 'r_id', 'essay_score', 'essay_status', 'q_type'], 'integer'],
            [['essay_cont'], 'string']		
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'essay_id' => Yii::t('app', 'Essay ID'),
            'q_id' => Yii::t('app', 'Q ID'),
            'r_id' => Yii::t('app', 'R ID'),
            'essay_cont' => Yii::t('app', 'Essay Cont'),
            'essay_score' => Yii::t('app', 'Essay Score'),
            'essay_status' => Yii::t('app', 'Essay Status'),
            'q_type' => Yii::t('app', 'Q Type'),
        ];
    }
}
