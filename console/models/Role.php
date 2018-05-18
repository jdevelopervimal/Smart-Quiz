<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%role}}".
 *
 * @property integer $id
 * @property integer $version
 * @property string $authority
 * @property string $description
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property string $updated_by
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%role}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'version', 'authority'], 'required'],
            [['id', 'version'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['authority', 'description', 'name'], 'string', 'max' => 255],
            [['updated_by'], 'string', 'max' => 100],
            [['authority'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'version' => Yii::t('app', 'Version'),
            'authority' => Yii::t('app', 'Authority'),
            'description' => Yii::t('app', 'Description'),
            'name' => Yii::t('app', 'Name'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }
}
