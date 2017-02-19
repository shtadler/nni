<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'Admin';
?>
<div class="site-index">
    <div class="body-content">

        <div class="container-fluid row">
            <div class="col-md-3">
                <h2>Администраторы</h2>

                <p>Этот раздел служит для управления пользователями (администраторами).</p>

                <p><?= Html::a('Перейти &raquo;', ['user/index'], ['class' => 'btn btn-default'])?></p>
            </div>
            <div class="col-md-3">
                <h2>Статьи</h2>

                <p>Этот раздел служит для управления статьями для студентов и абитуриентов.</p>

                <p><?= Html::a('Перейти &raquo;', ['article/index'], ['class' => 'btn btn-default'])?></p>
            </div>
            <div class="col-md-3">
                <h2>Страницы</h2>

                <p>Этот раздел служит для управления одиночними страницами и ссылками на них в меню и подменю.</p>

                <p><?= Html::a('Перейти &raquo;', ['page/index'], ['class' => 'btn btn-default'])?></p>
            </div>
            <div class="col-md-3">
                <h2>Документы</h2>

                <p>Служит для управления документами на сайте</p>

                <p><?= Html::a('Перейти &raquo;', ['document/index'], ['class' => 'btn btn-default'])?></p>
            </div>
        </div>
        <div class="container-fluid row">
            <div class="col-md-3">
                <h2>Слайдер</h2>

                <p>Служит для управления слайдами на главной странице.</p>

                <p><?= Html::a('Перейти &raquo;', ['main-slider/index'], ['class' => 'btn btn-default'])?></p>
            </div>
            <div class="col-md-3">
                <h2>Контент</h2>

                <p>Служит для управления контентом (текстом) на сайте</p>

                <p><?= Html::a('Перейти &raquo;', ['content/index'], ['class' => 'btn btn-default'])?></p>
            </div>

        </div>
    </div>
</div>