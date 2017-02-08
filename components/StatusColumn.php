<?php

namespace app\components;

class StatusColumn extends \yii\grid\DataColumn {
    /** @var string For status format */
    public $format = 'status';

    public $headerOptions = ['width' => '30px'];

    public $contentOptions = ['class' => 'text-center status-holder'];

    public $filter = [1=>'✔', 0=>'✘'];

}