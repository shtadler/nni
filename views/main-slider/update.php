<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MainSlider */

$this->title = 'Update Main Slider: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Main Sliders', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="main-slider-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
