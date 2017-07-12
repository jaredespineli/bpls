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
            [['assessment_id', 'or_number', 'payment_quarter', 'payment_annually', 'payment_bi_annually', 'grand_total', 'assessed_value'], 'integer'],
            [['business_name', 'president_name', 'payment_status', 'payment_kind'], 'safe']
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
        ];
    }
}
