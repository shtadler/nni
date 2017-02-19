<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MainSliderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Main Sliders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-slider-index">

    <p class="text-right">
        <?= Html::a('Create slider', ['create'], ['class' => 'btn btn-lg btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'title',
            'description:html',
            [
                'attribute' => 'status',
                'class' => 'app\components\StatusColumn'
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'visibleButtons' => [
                    'view' => false,
                ]
            ],
        ],
    ]); ?>
</div>
