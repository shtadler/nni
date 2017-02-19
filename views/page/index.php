<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">

    <p class="text-right">
        <?= Html::a('Create page', ['create'], ['class' => 'btn btn-lg btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'title',
            'furl.title',
            'furl.description',
            [
                'attribute' => 'to_dropdown',
                'class' => 'app\components\StatusColumn'
            ],
            [
                'attribute' => 'to_submenu',
                'class' => 'app\components\StatusColumn'
            ],
            [
                'class' => 'yii\grid\ActionColumn'
            ],
        ],
    ]); ?>
</div>
