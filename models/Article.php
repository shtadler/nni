<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\Url;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $title
 * @property integer $for_students
 * @property integer $for_abitur
 * @property string $description
 * @property string $text
 * @property integer $furl_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Furl $furl
 * @property Document[] $documents
 * @property array $initialPreview
 * @property array $initialPreviewConfig
 */
class Article extends \yii\db\ActiveRecord
{

    public $file;
    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['for_students', 'for_abitur', 'furl_id'], 'integer'],
            [['description', 'text'], 'string'],
            [['furl_id'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
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
            'for_students' => 'For Students',
            'for_abitur' => 'For Abitur',
            'description' => 'Description',
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


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocuments()
    {
        return $this->hasMany(Document::className(), ['entity_id' => 'id'])->where(['entity_name' => Document::ARTICLE]);
    }

    public function getInitialPreview()
    {
        if($this->isNewRecord) {
            return null;
        }

        $previews = [];
        foreach ($this->documents as $document) {
            $previews[] = Yii::getAlias("@web/uploads/{$document->hash_name}.{$document->extension}");
        }
        return $previews;
    }

    public function getInitialPreviewConfig()
    {
        if($this->isNewRecord) {
            return null;
        }
        $conf = [];
        foreach ($this->documents as $document) {
            $type = 'other';
            if(explode('/',$document->mime)[0] == 'image') {
                $type = 'image';
            } elseif($document->mime == 'application/pdf') {
                $type = 'pdf';
            }
            $conf[] = [
                'type' => $type,
                'caption' => $document->name,
                'size' => $document->size,
                'url' => Url::to(['article/delete-document', 'hash'=> $document->hash_name])
            ];
        }

        return $conf;
    }
}
