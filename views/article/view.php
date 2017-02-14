<?php
/**
 * @var $this yii\web\View
 * @var $model app\models\Article
 */

use yii\helpers\Html;


?>
<section class="first">
    <div class="container">
        <div class="box">

            <div class="center gap">
                <h1><?= Html::encode($model->title) ?></h1>
            </div><!--/.center-->

            <?= $model->text?>

        </div><!--/.box-->
    </div><!--/.container-->

</section>


