<?php

namespace app\components;

use Yii;
use yii\helpers\Html;

class Formatter extends \yii\i18n\Formatter {
    /**
     * Formats the value as a hyperlink.
     * @param mixed $value the value to be formatted.
     * @param array $options the tag options in terms of name-value pairs. See [[Html::a()]].
     * @return string the formatted result.
     */
    public function asStatus($value, $options = []) {

        $class = $value ? 'glyphicon glyphicon-ok-circle' : 'glyphicon glyphicon-remove-circle';

        return Html::tag('span', '', ['class' => $class]);
    }
}