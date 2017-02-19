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

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Page', ['create'], ['class' => 'btn btn-success']) ?>
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
