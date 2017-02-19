<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "content".
 *
 * @property integer $id
 * @property string $text
 * @property string $description
 */
class Content extends \yii\db\ActiveRecord
{
    const FIRST_ADDRESS = 1;
    const SECOND_ADDRESS = 2;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'content';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text', 'description'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'description' => 'Description',
        ];
    }

    function __toString() {
       return $this->text;
    }

}
