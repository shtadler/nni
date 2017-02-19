<?php
/**
 * @var $articles \app\models\Article[]
 * @var $this \app\components\View
 */
use yii\helpers\Html;

?>
<section class="first">
    <div class="container">
        <div class="box">

            <div class="center gap">
                <h1><?= Html::encode($this->title) ?></h1>
            </div>
<div class="row">
                <?php foreach($articles as $article) : ?>
                    <div class="col-sm-4">
                        <?= $this->render('_swiperBody', ['article' => $article])?>
                    </div>
                <?php endforeach; ?>
</div>
        </div><!--/.box-->
    </div><!--/.container-->

</section>
