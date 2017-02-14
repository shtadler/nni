<?php
/**
 * @var $article \app\models\Article
 */
use yii\helpers\Html;

?>
<div class="student-block">
    <div class="center">
        <h4><?= $article->title ?></h4>

        <p><?= $article->description ?></p>
    </div>
    <div class="text-center">
        <?= Html::a('Перейти &raquo;', ['article/view', 'id' => $article->id], ['class' => 'btn btn-primary']) ?>
    </div>
</div>