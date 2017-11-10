<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "business".
 *
 * @property integer $user_id
 * @property string $business_name
 * @property string $trade_name
 * @property string $president_name
 * @property string $org_type
 * @property string $ein
 * @property string $tin
 * @property string $lob_code
 * @property string $lob_desc
 * @property string $capital_amount
 * @property string $tel_num
 * @property string $website_url
 * @property string $bldg_num
 * @property string $bldg_name
 * @property string $unit_num
 * @property string $street
 * @property string $subdivision
 * @property string $barangay
 * @property string $property_index_num
 * @property string $has_lessor
 * @property integer $lessor_business_id
 * @property double $business_area
 * @property integer $employee_count
 * @property string $sss_ref
 * @property string $sec_ref
 * @property string $dti_ref
 * @property string $cda_ref
 * @property string $fsic_ref
 * @property string $application_barcode
 * @property string $barangay_barcode
 * @property string $zoning_barcode
 * @property string $sanitary_barcode
 * @property string $occupancy_barcode
 * @property string $others_one_barcode
 * @property string $others_two_barcode
 * @property string $others_three_barcode
 * @property string $others_four_barcode
 * @property string $tax_payment_type
 * @property string $status
 * @property string $full_address
 * @property string $pay_mode
 * @property string $postal_code
 * @property integer $business_id
 * @property integer $isActive
 * @property string $sys_entry_date_month
 * @property string $sys_entry_date_day
 * @property integer $sys_entry_date_year
 * @property integer $business_status
 *
 * @property Approval[] $approvals
 * @property Assessment[] $assessments
 * @property Document[] $documents
 * @property Renewal[] $renewals
 */
class Business extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'business';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'lessor_business_id', 'employee_count', 'isActive', 'sys_entry_date_year'], 'integer'],
            [['capital_amount', 'business_area'], 'number'],
            [['business_name', 'trade_name', 'president_name', 'org_type', 'ein', 'tin', 'lob_code', 'lob_desc', 'tel_num', 'website_url', 'bldg_num', 'bldg_name', 'unit_num', 'street', 'subdivision', 'barangay', 'property_index_num', 'has_lessor', 'sss_ref', 'sec_ref', 'dti_ref', 'cda_ref', 'fsic_ref', 'application_barcode', 'barangay_barcode', 'zoning_barcode', 'sanitary_barcode', 'occupancy_barcode', 'others_one_barcode', 'others_two_barcode', 'others_three_barcode', 'others_four_barcode', 'tax_payment_type', 'status', 'full_address', 'pay_mode', 'postal_code', 'sys_entry_date_month', 'sys_entry_date_day','business_status'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'business_name' => 'Business Name',
            'trade_name' => 'Trade Name',
            'president_name' => 'President Name',
            'org_type' => 'Org Type',
            'ein' => 'Ein',
            'tin' => 'Tin',
            'lob_code' => 'Lob Code',
            'lob_desc' => 'Lob Desc',
            'capital_amount' => 'Capital Amount',
            'tel_num' => 'Tel Num',
            'website_url' => 'Website Url',
            'bldg_num' => 'Bldg Num',
            'bldg_name' => 'Bldg Name',
            'unit_num' => 'Unit Num',
            'street' => 'Street',
            'subdivision' => 'Subdivision',
            'barangay' => 'Barangay',
            'property_index_num' => 'Property Index Num',
            'has_lessor' => 'Has Lessor',
            'lessor_business_id' => 'Lessor Business ID',
            'business_area' => 'Business Area',
            'employee_count' => 'Employee Count',
            'sss_ref' => 'Sss Ref',
            'sec_ref' => 'Sec Ref',
            'dti_ref' => 'Dti Ref',
            'cda_ref' => 'Cda Ref',
            'fsic_ref' => 'Fsic Ref',
            'application_barcode' => 'Application Barcode',
            'barangay_barcode' => 'Barangay Barcode',
            'zoning_barcode' => 'Zoning Barcode',
            'sanitary_barcode' => 'Sanitary Barcode',
            'occupancy_barcode' => 'Occupancy Barcode',
            'others_one_barcode' => 'Others One Barcode',
            'others_two_barcode' => 'Others Two Barcode',
            'others_three_barcode' => 'Others Three Barcode',
            'others_four_barcode' => 'Others Four Barcode',
            'tax_payment_type' => 'Tax Payment Type',
            'status' => 'Status',
            'full_address' => 'Full Address',
            'pay_mode' => 'Pay Mode',
            'postal_code' => 'Postal Code',
            'business_id' => 'Business ID',
            'isActive' => 'Is Active',
            'sys_entry_date_month' => 'Sys Entry Date Month',
            'sys_entry_date_day' => 'Sys Entry Date Day',
            'sys_entry_date_year' => 'Sys Entry Date Year',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApprovals()
    {
        return $this->hasMany(Approval::className(), ['business_id' => 'business_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssessments()
    {
        return $this->hasMany(Assessment::className(), ['business_id' => 'business_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocuments()
    {
        return $this->hasMany(Document::className(), ['business_id' => 'business_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRenewals()
    {
        return $this->hasMany(Renewal::className(), ['business_id' => 'business_id']);
    }
}
