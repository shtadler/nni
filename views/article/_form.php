<?php
use kartik\file\FileInput;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
/* @var $furl \app\models\Furl */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data'] // important
    ]); ?>
    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-2">
            <?= $form->field($model, 'for_students')->checkbox() ?>
            <?= $form->field($model, 'for_abitur')->checkbox() ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'description')->textarea(['rows' => 2]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
        <?= $form->field($model, 'text')->widget(TinyMce::className(), [
            'options' => ['rows' => 6],
            'language' => 'uk',
            'clientOptions' => [
                'plugins' => [
                    "advlist autolink lists link charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste",
                    "fullscreen",
                    "media",
                    "image imagetools",
                    'textcolor colorpicker',
                ],
                'toolbar' => "undo redo | styleselect | bold italic | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | fullscreen | media"
            ]
        ]);?>
        </div>
        <div class="col-sm-12">
        <?php
            echo '<br><label>Документы</label>';
            echo FileInput::widget([
                'model' => $model,
                'attribute' => 'file[]',
                'options' => ['multiple' => true],
                'pluginOptions' => [
                    'initialPreview'=> $model->initialPreview,
                    'initialPreviewAsData'=>true,
                    'initialPreviewConfig' => $model->initialPreviewConfig,
                    'overwriteInitial'=>false,
                    'maxFileSize'=>4000,
                ]
            ]);
            ?>
            </div>
        <div class="col-sm-12">
            <h2>Url</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($furl, 'title')->textInput() ?>
        </div>
        <div class="col-sm-8">
            <?= $form->field($furl, 'description')->textInput() ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-lg btn-success' : 'btn btn-lg btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
