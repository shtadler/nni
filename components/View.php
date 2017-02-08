<?php
namespace app\components;

use app\models\GalleryType;
use Yii;

class View extends \yii\web\View
{
    public $_galleries;

    /**
     * @return GalleryType[]
     */
    public function getGalleries()
    {
        if(empty($this->_galleries)) {
            $this->_galleries = GalleryType::find()->where(['status' => 1])->all();
        }

        return $this->_galleries;
    }

    /**
     * @return array
     */
    public function createGalleryTypeMenuItem()
    {
        $items = [];
        foreach ($this->getGalleries() as $gallery) {
            $items[] = ['label' => $gallery->name, 'url' => ['/gallery/index', 'id' => $gallery->id]];
        }

        return $items;
    }
}