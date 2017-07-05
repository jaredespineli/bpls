<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "issuance".
 *
 * @property integer $issuance_id
 * @property integer $approval_id
 * @property string $business_reg_num
 * @property string $full_business_name
 * @property string $or_reference
 * @property string $or_reference_date
 * @property string $released_to
 * @property string $scheduled_release_date
 * @property string $actual_release_date
 * @property string $issuance_barcode_ref
 * @property string $issued_by_name
 * @property string $issuance_by_id
 * @property string $sys_entry_date
 */
class Issuance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'issuance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['issuance_id'], 'required'],
            [['issuance_id', 'approval_id'], 'integer'],
            [['or_reference_date', 'scheduled_release_date', 'actual_release_date', 'sys_entry_date'], 'safe'],
            [['business_reg_num', 'full_business_name', 'or_reference', 'released_to', 'issuance_barcode_ref', 'issued_by_name', 'issuance_by_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'issuance_id' => 'Issuance ID',
            'approval_id' => 'Approval ID',
            'business_reg_num' => 'Business Reg Num',
            'full_business_name' => 'Full Business Name',
            'or_reference' => 'Or Reference',
            'or_reference_date' => 'Or Reference Date',
            'released_to' => 'Released To',
            'scheduled_release_date' => 'Scheduled Release Date',
            'actual_release_date' => 'Actual Release Date',
            'issuance_barcode_ref' => 'Issuance Barcode Ref',
            'issued_by_name' => 'Issued By Name',
            'issuance_by_id' => 'Issuance By ID',
            'sys_entry_date' => 'Sys Entry Date',
        ];
    }
}
