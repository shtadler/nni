<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<section class="first">
    <div class="container">
        <div class="box">

            <div class="center gap">
                <h1><?= Html::encode($this->title) ?></h1>
            </div><!--/.center-->

            <h3><?= nl2br(Html::encode($message)) ?></h3>

        </div><!--/.box-->
    </div><!--/.container-->

</section>
