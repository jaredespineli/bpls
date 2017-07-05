<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "approval".
 *
 * @property integer $approval_id
 * @property string $sic_code
 * @property string $property_index_code
 * @property string $postal_code
 * @property string $full_business_name
 * @property string $remarks
 * @property string $approval_status
 * @property string $business_reg_num
 * @property string $action_date
 * @property string $approval_date
 * @property string $issue_date
 * @property string $next_renewal_date
 * @property string $sys_entry_date
 * @property integer $account_holder_id
 */
class Approval extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'approval';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['approval_id'], 'required'],
            [['approval_id', 'account_holder_id'], 'integer'],
            [['action_date', 'approval_date', 'issue_date', 'next_renewal_date', 'sys_entry_date'], 'safe'],
            [['sic_code', 'property_index_code', 'postal_code', 'full_business_name', 'remarks', 'approval_status', 'business_reg_num'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'approval_id' => 'Approval ID',
            'sic_code' => 'Sic Code',
            'property_index_code' => 'Property Index Code',
            'postal_code' => 'Postal Code',
            'full_business_name' => 'Full Business Name',
            'remarks' => 'Remarks',
            'approval_status' => 'Approval Status',
            'business_reg_num' => 'Business Reg Num',
            'action_date' => 'Action Date',
            'approval_date' => 'Approval Date',
            'issue_date' => 'Issue Date',
            'next_renewal_date' => 'Next Renewal Date',
            'sys_entry_date' => 'Sys Entry Date',
            'account_holder_id' => 'Account Holder ID',
        ];
    }
}
