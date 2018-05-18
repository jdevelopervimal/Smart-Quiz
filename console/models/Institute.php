<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "institute_data".
 *
 * @property integer $su_institute_id
 * @property string $organization_name
 * @property string $logo
 * @property string $contact_info
 * @property integer $active_till
 * @property integer $status
 * @property string $description
 * @property string $custom_domain
 */
class Institute extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'institute_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['organization_name', 'contact_info', 'active_till', 'description'], 'required'],
            [['contact_info', 'description'], 'string'],
            [['active_till', 'status'], 'integer'],
            [['organization_name', 'logo'], 'string', 'max' => 100],
            [['custom_domain'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'su_institute_id' => Yii::t('app', 'Su Institute ID'),
            'organization_name' => Yii::t('app', 'Organization Name'),
            'logo' => Yii::t('app', 'Logo'),
            'contact_info' => Yii::t('app', 'Contact Info'),
            'active_till' => Yii::t('app', 'Active Till'),
            'status' => Yii::t('app', 'Status'),
            'description' => Yii::t('app', 'Description'),
            'custom_domain' => Yii::t('app', 'Custom Domain'),
        ];
    }
}
