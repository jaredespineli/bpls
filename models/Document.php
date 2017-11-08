<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "document".
 *
 * @property integer $document_id
 * @property string $document_status
 * @property integer $business_id
 * @property string $received_by
 * @property string $date
 * @property string $barangay_clearance_status
 * @property string $zoning_clearance_status
 * @property string $sanitary_clearance_status
 * @property string $occupancy_permit_status
 * @property string $fire_safety_status
 * @property string $barangay_clearance_reason
 * @property string $zoning_clearance_reason
 * @property string $sanitary_clearance_reason
 * @property string $occupancy_permit_reason
 * @property string $fire_safety_reason
 * @property string $barangay_clearance_received_by
 * @property string $zoning_clearance_received_by
 * @property string $sanitary_clearance_received_by
 * @property string $occupancy_permit_received_by
 * @property string $fire_safety_received_by
 * @property string $barangay_clearance_date
 * @property string $zoning_clearance_date
 * @property string $sanitary_clearance_date
 * @property string $occupancy_permit_date
 * @property string $fire_safety_date
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
            [['document_status', 'business_id'], 'required'],
            [['business_id'], 'integer'],
            [['document_status', 'received_by', 'date', 'barangay_clearance_status', 'zoning_clearance_status', 'sanitary_clearance_status', 'occupancy_permit_status', 'fire_safety_status', 'barangay_clearance_reason', 'zoning_clearance_reason', 'sanitary_clearance_reason', 'occupancy_permit_reason', 'fire_safety_reason', 'barangay_clearance_received_by', 'zoning_clearance_received_by', 'sanitary_clearance_received_by', 'occupancy_permit_received_by', 'fire_safety_received_by', 'barangay_clearance_date', 'zoning_clearance_date', 'sanitary_clearance_date', 'occupancy_permit_date', 'fire_safety_date'], 'string', 'max' => 255],
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
            'document_status' => 'Document Status',
            'business_id' => 'Business ID',
            'received_by' => 'Received By',
            'date' => 'Date',
            'barangay_clearance_status' => 'Barangay Clearance Status',
            'zoning_clearance_status' => 'Zoning Clearance Status',
            'sanitary_clearance_status' => 'Sanitary Clearance Status',
            'occupancy_permit_status' => 'Occupancy Permit Status',
            'fire_safety_status' => 'Fire Safety Status',
            'barangay_clearance_reason' => 'Barangay Clearance Reason',
            'zoning_clearance_reason' => 'Zoning Clearance Reason',
            'sanitary_clearance_reason' => 'Sanitary Clearance Reason',
            'occupancy_permit_reason' => 'Occupancy Permit Reason',
            'fire_safety_reason' => 'Fire Safety Reason',
            'barangay_clearance_received_by' => 'Barangay Clearance Received By',
            'zoning_clearance_received_by' => 'Zoning Clearance Received By',
            'sanitary_clearance_received_by' => 'Sanitary Clearance Received By',
            'occupancy_permit_received_by' => 'Occupancy Permit Received By',
            'fire_safety_received_by' => 'Fire Safety Received By',
            'barangay_clearance_date' => 'Barangay Clearance Date',
            'zoning_clearance_date' => 'Zoning Clearance Date',
            'sanitary_clearance_date' => 'Sanitary Clearance Date',
            'occupancy_permit_date' => 'Occupancy Permit Date',
            'fire_safety_date' => 'Fire Safety Date',
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
