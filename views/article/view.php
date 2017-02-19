<?php
/**
 * @var $this  yii\web\View
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
            <ul class="nav nav-tabs">

                <li class="active">
                    <a data-toggle="tab" href="#text">Текст</a>
                </li>

                <?php if($model->documents) : ?>
                    <li class="">
                        <a data-toggle="tab" href="#documents">Документи</a>
                    </li>
                <?php endif ?>
            </ul>

            <div class="tab-content">
                <div id="text" class="tab-pane fade in active">
                    <?= $model->text ?>
                </div>
                <?php if($model->documents) : ?>
                    <div id="documents" class="tab-pane fade">
                        <div class="list-group">
                            <?php foreach($model->documents as $file) : ?>
                                <div class="list-group-item">
                                    <h4 class="list-group-item-heading"><?= Html::encode($file->name)?></h4>
                                    <p class="list-group-item-text">
                                        Розмір: <?= Yii::$app->formatter->asShortSize($file->size, 1)?>
                                        <?= Html::a('', Yii::getAlias("@web/uploads/{$file->hash_name}.{$file->extension}"), [
                                            'class' => 'glyphicon glyphicon-download-alt pull-right',
                                            'download' => Html::encode($file->name),
                                        ])?>
                                    </p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif ?>
            </div>
        </div><!--/.box-->
    </div><!--/.container-->

</section>


