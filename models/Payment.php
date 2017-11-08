<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payment".
 *
 * @property integer $payment_id
 * @property integer $assessment_id
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['assessment_id', 'payment_quarter', 'payment_annually', 'payment_bi_annually'], 'integer'],
            [['business_name', 'president_name', 'payment_status', 'payment_kind', 'or_number', 'date', 'received_by', 'payment_status_per'], 'safe'],
            [['grand_total', 'assessed_value'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'payment_id' => 'Payment ID',
            'assessment_id' => 'Assessment ID',
            'or_number' => 'Official Receipt Number',
            'business_name' => 'Business Name',
            'president_name' => 'Property Owner',
            'payment_quarter' => 'Payment(Quarterly)',
            'payment_annually' => 'Payment(Annually)',
            'payment_bi_annually' => 'Payment(Bi-Annually)',
            'grand_total' => 'Grand Total',
            'assessed_value' => 'Assessed Value',
            'payment_status' => 'Payment Status',
            'payment_kind' => 'Type of Payment',
            'date' => 'Date',
            'received_by' => 'Received By'
        ];
    }
}
