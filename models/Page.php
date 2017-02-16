<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "page".
 *
 * @property integer $id
 * @property string $title
 * @property integer $to_dropdown
 * @property integer $to_submenu
 * @property string $text
 * @property integer $furl_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Furl $furl
 */
class Page extends \yii\db\ActiveRecord
{


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['to_dropdown', 'to_submenu', 'furl_id'], 'integer'],
            [['text'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['furl_id'], 'exist', 'skipOnError' => true, 'targetClass' => Furl::className(), 'targetAttribute' => ['furl_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'to_dropdown' => 'To Dropdown',
            'to_submenu' => 'To Submenu',
            'text' => 'Text',
            'furl_id' => 'Furl ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFurl()
    {
        return $this->hasOne(Furl::className(), ['id' => 'furl_id']);
    }
}
