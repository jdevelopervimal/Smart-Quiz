<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $status
 * @property string $first_name
 * @property string $last_name
 * @property integer $institute_id
 * @property string $profile_pic
 * @property integer $referrer
 * @property string $date_of_birth
 * @property string $fathers_name
 * @property string $gender
 * @property string $marital_status
 * @property string $login_status
 * @property string $login_time
 * @property string $logout_time
 * @property string $otp_expire
 * @property integer $role_id
 * @property string $membership
 * @property integer $group_id
 * @property string $profile_status
 * @property integer $updated_by
 * @property string $created_at
 * @property string $updated_at
 */
class User extends ActiveRecord implements IdentityInterface {

    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['auth_key', 'password_hash', 'email'], 'required'],
            [['status', 'gender', 'marital_status', 'login_status', 'membership', 'profile_status'], 'string'],
            [['institute_id', 'role_id', 'group_id'], 'integer'],
            [['login_time', 'logout_time', 'otp_expire'], 'safe'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['first_name', 'last_name', 'fathers_name'], 'string', 'max' => 50],
            [['profile_pic'], 'string', 'max' => 100],
            [['date_of_birth'], 'string', 'max' => 20],
            [['email'], 'unique'],
            [['username'], 'unique'],
            [['password_reset_token'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'email' => Yii::t('app', 'Email'),
            'status' => Yii::t('app', 'Status'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'institute_id' => Yii::t('app', 'Institute ID'),
            'profile_pic' => Yii::t('app', 'Profile Pic'),
            'referrer' => Yii::t('app', 'Referrer'),
            'date_of_birth' => Yii::t('app', 'Date Of Birth'),
            'fathers_name' => Yii::t('app', 'Fathers Name'),
            'gender' => Yii::t('app', 'Gender'),
            'marital_status' => Yii::t('app', 'Marital Status'),
            'login_status' => Yii::t('app', 'Login Status'),
            'login_time' => Yii::t('app', 'Login Time'),
            'logout_time' => Yii::t('app', 'Logout Time'),
            'otp_expire' => Yii::t('app', 'Otp Expire'),
            'role_id' => Yii::t('app', 'Role ID'),
            'membership' => Yii::t('app', 'Membership'),
            'group_id' => Yii::t('app', 'Group ID'),
            'profile_status' => Yii::t('app', 'Profile Status'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id) {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username) {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token) {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
                    'password_reset_token' => $token,
                    'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token) {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId() {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey() {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey) {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password) {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password) {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey() {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken() {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken() {
        $this->password_reset_token = null;
    }

    public static function getAllUser() {
        $connection = \Yii::$app->db;
        $sql = 'select u.id, u.username, u.email,u.first_name,u.last_name,u.status, u.membership,u.profile_status,ug.group_name,	i.organization_name from'
                . ' user u'
                . ' left join user_group ug on ug.gid = u.group_id'
                . ' left join institute_data i on i.su_institute_id = u.institute_id'
                . ' where u.trash = "0"';
        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
        return $data;
    }

    public static function getUserData($email) {
        $connection = \Yii::$app->db;
        $sql = 'select u.id, u.username,u.password_hash,u.profile_status,u.profile_pic,u.group_id, u.email,u.first_name,u.last_name,u.status, u.membership,u.profile_status,ug.group_name,	i.organization_name from'
                . ' user u'
                . ' left join user_group ug on ug.gid = u.group_id'
                . ' left join institute_data i on i.su_institute_id = u.institute_id'
                . ' where  u.email = "' . $email . '"';
        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
        return $data;
    }

}
