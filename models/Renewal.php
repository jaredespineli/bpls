<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "renewal".
 *
 * @property integer $renewal_id
 * @property string $renewal_status
 * @property integer $business_id
 * @property string $business_name
 *
 * @property Business $business
 */
class Renewal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'renewal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['business_id'], 'integer'],
            [['renewal_status', 'business_name'], 'string', 'max' => 255],
            [['business_id'], 'exist', 'skipOnError' => true, 'targetClass' => Business::className(), 'targetAttribute' => ['business_id' => 'business_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'renewal_id' => 'Renewal ID',
            'renewal_status' => 'Renewal Status',
            'business_id' => 'Business ID',
            'business_name' => 'Business Name',
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
