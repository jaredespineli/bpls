<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "document".
 *
 * @property integer $document_id
 * @property string $barangay_clearance
 * @property string $barangay_status
 * @property string $zoning_clearance
 * @property string $zoning_status
 * @property string $sanitary_clearance
 * @property string $sanitary_status
 * @property string $occupancy_permit
 * @property string $occupancy_status
 * @property string $fire_safety
 * @property string $fire_safety_status
 * @property string $file_path
 * @property string $sys_entry_date
 * @property integer $account_holder_id
 * @property string $document_status
 * @property integer $business_id
 *
 * @property Business $business
 */
class Document extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'document';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['document_id', 'business_id'], 'required'],
            [['document_id', 'business_id'], 'integer'],
            [['barangay_clearance', 'zoning_clearance', 'sanitary_clearance', 'occupancy_permit', 'fire_safety', 'file_path', 'document_status'], 'string', 'max' => 255],
            [['business_id'], 'exist', 'skipOnError' => true, 'targetClass' => Business::className(), 'targetAttribute' => ['business_id' => 'business_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'document_id' => 'Document ID',
            'barangay_clearance' => 'Barangay Clearance',
            'barangay_status' => 'Barangay Status',
            'zoning_clearance' => 'Zoning Clearance',
            'zoning_status' => 'Zoning Status',
            'sanitary_clearance' => 'Sanitary Clearance',
            'sanitary_status' => 'Sanitary Status',
            'occupancy_permit' => 'Occupancy Permit',
            'occupancy_status' => 'Occupancy Status',
            'fire_safety' => 'Fire Safety',
            'fire_safety_status' => 'Fire Safety Status',
            'file_path' => 'File Path',
            'sys_entry_date' => 'Sys Entry Date',
            'account_holder_id' => 'Account Holder ID',
            'document_status' => 'Document Status',
            'business_id' => 'Business ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBusiness()
    {
        return $this->hasOne(Business::className(), ['business_id' => 'business_id']);
    }
}
