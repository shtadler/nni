<?php
use dosamigos\tinymce\TinyMce;
use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Page */
/* @var $form yii\widgets\ActiveForm */
/* @var $furl \app\models\Furl */
?>

<div class="page-form">

    <?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data'] // important
    ]); ?>

    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-2">
            <?= $form->field($model, 'to_dropdown')->checkbox() ?>

        </div>
        <div class="col-sm-2">
            <?= $form->field($model, 'to_submenu')->checkbox() ?>
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
