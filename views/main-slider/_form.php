<?php
use dosamigos\tinymce\TinyMce;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MainSlider */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="main-slider-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-xs-8"><?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?></div>
    <div class="col-xs-4"> <?= $form->field($model, 'status')->checkbox() ?></div>
</div>


    <?= $form->field($model, 'description')->widget(TinyMce::className(), [
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



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
