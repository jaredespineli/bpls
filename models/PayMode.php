<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pay_mode".
 *
 * @property integer $pay_mode_id
 * @property string $due_date
 * @property string $or_num
 * @property string $name
 * @property double $amount_due
 * @property integer $payment_holder_id
 * @property double $amount_id
 */
class PayMode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pay_mode';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pay_mode_id'], 'required'],
            [['pay_mode_id', 'payment_holder_id'], 'integer'],
            [['due_date'], 'safe'],
            [['amount_due', 'amount_id'], 'number'],
            [['or_num', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pay_mode_id' => 'Pay Mode ID',
            'due_date' => 'Due Date',
            'or_num' => 'Or Num',
            'name' => 'Name',
            'amount_due' => 'Amount Due',
            'payment_holder_id' => 'Payment Holder ID',
            'amount_id' => 'Amount ID',
        ];
    }
}
