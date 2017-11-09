<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "taxpayer".
 *
 * @property string $taxpayer_email_add
 * @property string $taxpayer_username
 * @property string $taxpayer_password
 * @property string $taxpayer_confirm_password
 * @property string $taxpayer_fname
 * @property string $taxpayer_mname
 * @property string $taxpayer_lname
 * @property string $taxpayer_suffix_name
 * @property string $taxpayer_dob_month
 * @property string $taxpayer_dob_day
 * @property string $taxpayer_dob_year
 * @property string $taxpayer_civil_status
 * @property string $taxpayer_sex
 * @property string $taxpayer_tin
 * @property string $taxpayer_bir_app_date
 * @property string $taxpayer_address_unit_num
 * @property string $taxpayer_address_street
 * @property string $taxpayer_address_subdivision
 * @property string $taxpayer_address_barangay
 * @property string $taxpayer_contact_type
 * @property string $taxpayer_contact_detail
 * @property string $taxpayer_emergency_contact_fname
 * @property string $taxpayer_emergency_contact_mname
 * @property string $taxpayer_emergency_contact_lname
 * @property string $taxpayer_emergency_contact_suffix_name
 * @property string $taxpayer_emergency_contact_relationship
 * @property string $taxpayer_emergency_contact_number
 * @property string $taxpayer_emergency_contact_email_address
 * @property string $taxpayer_birth_date
 * @property integer $taxpayer_id
 * @property string $taxpayer_address
 * @property integer $user_id
 *
 * @property User $user
 */
class Taxpayer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'taxpayer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['taxpayer_bir_app_date', 'taxpayer_birth_date'], 'safe'],
            [['taxpayer_emergency_contact_number', 'taxpayer_emergency_contact_email_address'], 'string'],
            [['user_id'], 'integer'],
            [['taxpayer_email_add', 'taxpayer_username', 'taxpayer_password', 'taxpayer_confirm_password', 'taxpayer_fname', 'taxpayer_mname', 'taxpayer_lname', 'taxpayer_suffix_name', 'taxpayer_dob_month', 'taxpayer_dob_day', 'taxpayer_dob_year', 'taxpayer_civil_status', 'taxpayer_sex', 'taxpayer_tin', 'taxpayer_address_unit_num', 'taxpayer_address_street', 'taxpayer_address_subdivision', 'taxpayer_address_barangay', 'taxpayer_contact_type', 'taxpayer_contact_detail', 'taxpayer_emergency_contact_fname', 'taxpayer_emergency_contact_mname', 'taxpayer_emergency_contact_lname', 'taxpayer_emergency_contact_suffix_name', 'taxpayer_emergency_contact_relationship', 'taxpayer_address'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'taxpayer_email_add' => 'Email Address',
            'taxpayer_username' => 'Username',
            'taxpayer_password' => 'Password',
            'taxpayer_confirm_password' => 'Confirm Password',
            'taxpayer_fname' => 'First Name',
            'taxpayer_mname' => 'Middle name',
            'taxpayer_lname' => 'Last Name',
            'taxpayer_suffix_name' => 'Suffix Name',
            'taxpayer_dob_month' => 'Date of Birth(Month)',
            'taxpayer_dob_day' => 'Date of Birth(Day)',
            'taxpayer_dob_year' => 'Date of Birth(Year)',
            'taxpayer_civil_status' => 'Civil Status',
            'taxpayer_sex' => 'Sex',
            'taxpayer_tin' => 'Tin',
            'taxpayer_bir_app_date' => 'Bir Application Date',
            'taxpayer_address_unit_num' => 'Unit Number',
            'taxpayer_address_street' => 'Street',
            'taxpayer_address_subdivision' => 'Subdivision',
            'taxpayer_address_barangay' => 'Barangay',
            'taxpayer_contact_type' => 'Contact Type',
            'taxpayer_contact_detail' => 'Contact Detail',
            'taxpayer_emergency_contact_fname' => 'First Name',
            'taxpayer_emergency_contact_mname' => 'Middle Name',
            'taxpayer_emergency_contact_lname' => 'Last Name',
            'taxpayer_emergency_contact_suffix_name' => 'Suffix Name',
            'taxpayer_emergency_contact_relationship' => 'Relationship',
            'taxpayer_emergency_contact_number' => 'Contact Number',
            'taxpayer_emergency_contact_email_address' => 'Email Address',
            'taxpayer_birth_date' => 'Birth Date',
            //'taxpayer_id' => 'Taxpayer ID',
            //'taxpayer_address' => 'Taxpayer Address',
            //'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'user_id']);
    }
}
