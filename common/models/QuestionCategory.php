<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%question_category}}".
 *
 * @property integer $cid
 * @property string $category_name
 * @property integer $cat_duration
 * @property integer $institute_id
 */
class QuestionCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%question_category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_name'], 'required'],
            [['cat_duration', 'institute_id'], 'integer'],
            [['category_name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cid' => Yii::t('app', 'Cid'),
            'category_name' => Yii::t('app', 'Category Name'),
            'cat_duration' => Yii::t('app', 'Cat Duration'),
            'institute_id' => Yii::t('app', 'Institute ID'),
        ];
    }
}
