<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "businesstype".
 *
 * @property integer $businesstype_id
 * @property string $org_type
 */
class Businesstype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'businesstype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['businesstype_id'], 'required'],
            [['businesstype_id'], 'integer'],
            [['org_type'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'businesstype_id' => 'Businesstype ID',
            'org_type' => 'Org Type',
        ];
    }
}
