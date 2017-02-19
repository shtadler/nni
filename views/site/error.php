<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        The above error occurred while the Web server was processing your request.
    </p>
    <p>
        Please contact us if you think this is a server error. Thank you.
    </p>

</div>

<section class="first">
    <div class="container">
        <div class="box">

            <div class="center gap">
                <h1><?= Html::encode($model->title) ?></h1>
            </div><!--/.center-->

            <h3><?= nl2br(Html::encode($message)) ?></h3>

        </div><!--/.box-->
    </div><!--/.container-->

</section>
