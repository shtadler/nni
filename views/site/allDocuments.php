<?php
/**
 * @var $documents \app\models\Document[]
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

            <div class="list-group">
                <?php foreach($documents as $file) : ?>
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

        </div><!--/.box-->
    </div><!--/.container-->

</section>
