<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "progress".
 *
 * @property integer $progress_id
 * @property string $business_information
 * @property string $documents
 * @property string $assessment
 * @property string $payment
 * @property string $approval
 * @property integer $account_holder_id
 */
class Progress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'progress';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['progress_id'], 'required'],
            [['progress_id', 'account_holder_id'], 'integer'],
            [['business_information', 'documents', 'assessment', 'payment', 'approval'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'progress_id' => 'Progress ID',
            'business_information' => 'Business Information',
            'documents' => 'Documents',
            'assessment' => 'Assessment',
            'payment' => 'Payment',
            'approval' => 'Approval',
            'account_holder_id' => 'Account Holder ID',
        ];
    }
}
