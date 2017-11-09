<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $user_id
 * @property string $full_name
 * @property string $username
 * @property string $password
 * @property string $user_type
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $authKey
 * @property string $suffix_name
 *
 * @property Taxpayer[] $taxpayers
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'user_type', 'last_name', 'authKey'], 'required'],
            [['full_name', 'username', 'first_name', 'middle_name', 'last_name', 'suffix_name'], 'string', 'max' => 255],
            [['password', 'authKey'], 'string', 'max' => 32],
            [['user_type'], 'string', 'max' => 10],
            [['username'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'full_name' => 'Full Name',
            'username' => 'Username',
            'password' => 'Password',
            'user_type' => 'User Type',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'authKey' => 'Auth Key',
            'suffix_name' => 'Suffix Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaxpayers()
    {
        return $this->hasMany(Taxpayer::className(), ['user_id' => 'user_id']);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // return $this->access_token;
        throw new NotSupportedException();
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {

       return self::findOne(['username'=>trim($username, " ")]);

    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->user_id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        $trimmed = trim($this->password, " ");
        return $trimmed === $password;
    }
}
