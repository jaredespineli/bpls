<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Taxpayer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="taxpayer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'taxpayer_email_add')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taxpayer_username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taxpayer_password')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taxpayer_confirm_password')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taxpayer_fname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taxpayer_mname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taxpayer_lname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taxpayer_suffix_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taxpayer_dob_month')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taxpayer_dob_day')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taxpayer_dob_year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taxpayer_civil_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taxpayer_sex')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taxpayer_tin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taxpayer_bir_app_date')->textInput() ?>    

    <?= $form->field($model, 'taxpayer_address_unit_num')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taxpayer_address_street')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taxpayer_address_subdivision')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taxpayer_address_barangay')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taxpayer_contact_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taxpayer_contact_detail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taxpayer_emergency_contact_fname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taxpayer_emergency_contact_mname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taxpayer_emergency_contact_lname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taxpayer_emergency_contact_suffix_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taxpayer_emergency_contact_relationship')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taxpayer_emergency_contact_number')->textInput() ?>

    <?= $form->field($model, 'taxpayer_emergency_contact_email_address')->textInput() ?>

    <?= $form->field($model, 'taxpayer_birth_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
