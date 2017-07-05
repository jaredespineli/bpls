<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lob".
 *
 * @property string $major_code
 * @property string $code
 * @property string $description
 */
class Lob extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lob';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['major_code'], 'required'],
            [['major_code', 'code', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'major_code' => 'Major Code',
            'code' => 'Code',
            'description' => 'Description',
        ];
    }
}
