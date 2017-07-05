<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bus_acct_holder".
 *
 * @property integer $account_holder_id
 * @property integer $business_id
 * @property integer $user_id
 * @property string $application_date
 */
class BusAcctHolder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bus_acct_holder';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['account_holder_id'], 'required'],
            [['account_holder_id', 'business_id', 'user_id'], 'integer'],
            [['application_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'account_holder_id' => 'Account Holder ID',
            'business_id' => 'Business ID',
            'user_id' => 'User ID',
            'application_date' => 'Application Date',
        ];
    }
}
