<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Document */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="document-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'document_id')->textInput() ?>

    <?= $form->field($model, 'barangay_clearance')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'barangay_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zoning_clearance')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zoning_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sanitary_clearance')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sanitary_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'occupancy_permit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'occupancy_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fire_safety')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fire_safety_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file_path')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sys_entry_date')->textInput() ?>

    <?= $form->field($model, 'account_holder_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
