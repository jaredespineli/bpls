<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Progress */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="progress-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'progress_id')->textInput() ?>

    <?= $form->field($model, 'business_information')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'documents')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'assessment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'payment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'approval')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'account_holder_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
