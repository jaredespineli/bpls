<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payment_holder".
 *
 * @property integer $payment_holder_id
 * @property integer $account_holder_id
 * @property integer $business_id
 */
class PaymentHolder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payment_holder';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['payment_holder_id'], 'required'],
            [['payment_holder_id', 'account_holder_id', 'business_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'payment_holder_id' => 'Payment Holder ID',
            'account_holder_id' => 'Account Holder ID',
            'business_id' => 'Business ID',
        ];
    }
}
