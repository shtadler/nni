<?php

namespace app\components;

use Yii;
use yii\helpers\Html;

class ActiveField extends \yii\widgets\ActiveField {

    /**
     * @param array $options
     * @return $this
     */
    public function statusField($options = [])
    {
        $options = array_merge($this->inputOptions, $options);
        $this->adjustLabelFor($options);
        $this->parts['{input}'] = Html::activeDropDownList($this->model, $this->attribute, [1=>'✔', 0=>'✘'], $options);

        return $this;
    }
}