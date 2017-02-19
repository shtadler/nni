<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <p class="text-right">
        <?= Html::a('Create article', ['create'], ['class' => 'btn btn-lg btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            'description:ntext',
            'furl.title',
            'furl.description',
            [
                'attribute' => 'for_students',
                'class' => 'app\components\StatusColumn'
            ],
            [
                'attribute' => 'for_abitur',
                'class' => 'app\components\StatusColumn'
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
