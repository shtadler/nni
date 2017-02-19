<?php
namespace app\components;

use app\models\GalleryType;
use app\models\Page;
use Yii;

class View extends \yii\web\View
{
    private $_pages;

    /**
     * @return Page[]
     */
    public function getPages()
    {
        if(empty($this->_pages)) {
            $this->_pages = Page::find()->where(['to_dropdown' => 1])->all();
        }

        return $this->_pages;
    }
}