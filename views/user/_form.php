<?php
use app\components\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form ActiveForm */
?>

<div class="user-form">
        <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'username')->textInput()?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'email')->textInput();?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'pass')->textInput(); ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'status')->statusField(); ?>
        </div>
    </div>
        <div class="form-group text-right">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-lg btn-success' : 'btn btn-lg btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

</div>
