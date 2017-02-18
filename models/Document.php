<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "document".
 *
 * @property integer $id
 * @property integer $entity_id
 * @property string $entity_name
 * @property string $name
 * @property int $size
 * @property string $hash_name
 * @property string $extension
 * @property string $mime
 */
class Document extends \yii\db\ActiveRecord
{
    const ARTICLE = 'article';
    const PAGE = 'page';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'document';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['entity_id', 'entity_name', 'extension'], 'required'],
            [['entity_id', 'size',], 'integer'],
            [['entity_name', 'name', 'hash_name', 'extension', 'mime'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'entity_id' => 'Entity ID',
            'entity_name' => 'Entity Name',
            'name' => 'Name',
            'size' => 'Size',
            'hash_name' => 'Hash Name',
        ];
    }
}
