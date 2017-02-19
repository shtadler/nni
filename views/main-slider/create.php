<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MainSlider */

$this->title = 'Create Main Slider';
$this->params['breadcrumbs'][] = ['label' => 'Main Sliders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-slider-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
