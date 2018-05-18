<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%difficult_level}}".
 *
 * @property integer $did
 * @property string $level_name
 * @property integer $institute_id
 */
class DifficultLevel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%difficult_level}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['level_name'], 'required'],
            [['institute_id'], 'integer'],
            [['level_name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'did' => Yii::t('app', 'Did'),
            'level_name' => Yii::t('app', 'Level Name'),
            'institute_id' => Yii::t('app', 'Institute ID'),
        ];
    }
}
