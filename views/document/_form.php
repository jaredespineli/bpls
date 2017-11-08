<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Document */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="document-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'document_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'business_id')->textInput() ?>

    <?= $form->field($model, 'received_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'barangay_clearance_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zoning_clearance_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sanitary_clearance_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'occupancy_permit_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fire_safety_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'barangay_clearance_reason')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zoning_clearance_reason')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sanitary_clearance_reason')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'occupancy_permit_reason')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fire_safety_reason')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'barangay_clearance_received_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zoning_clearance_received_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sanitary_clearance_received_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'occupancy_permit_received_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fire_safety_received_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'barangay_clearance_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zoning_clearance_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sanitary_clearance_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'occupancy_permit_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fire_safety_date')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
