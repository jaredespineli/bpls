<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TaxpayerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="taxpayer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'taxpayer_email_add') ?>

    <?= $form->field($model, 'taxpayer_username') ?>

    <?= $form->field($model, 'taxpayer_password') ?>

    <?= $form->field($model, 'taxpayer_confirm_password') ?>

    <?= $form->field($model, 'taxpayer_fname') ?>

    <?php // echo $form->field($model, 'taxpayer_mname') ?>

    <?php // echo $form->field($model, 'taxpayer_lname') ?>

    <?php // echo $form->field($model, 'taxpayer_suffix_name') ?>

    <?php // echo $form->field($model, 'taxpayer_dob_month') ?>

    <?php // echo $form->field($model, 'taxpayer_dob_day') ?>

    <?php // echo $form->field($model, 'taxpayer_dob_year') ?>

    <?php // echo $form->field($model, 'taxpayer_civil_status') ?>

    <?php // echo $form->field($model, 'taxpayer_sex') ?>

    <?php // echo $form->field($model, 'taxpayer_tin') ?>

    <?php // echo $form->field($model, 'taxpayer_bir_app_date') ?>

    <?php // echo $form->field($model, 'taxpayer_address_unit_num') ?>

    <?php // echo $form->field($model, 'taxpayer_address_street') ?>

    <?php // echo $form->field($model, 'taxpayer_address_subdivision') ?>

    <?php // echo $form->field($model, 'taxpayer_address_barangay') ?>

    <?php // echo $form->field($model, 'taxpayer_contact_type') ?>

    <?php // echo $form->field($model, 'taxpayer_contact_detail') ?>

    <?php // echo $form->field($model, 'taxpayer_emergency_contact_fname') ?>

    <?php // echo $form->field($model, 'taxpayer_emergency_contact_mname') ?>

    <?php // echo $form->field($model, 'taxpayer_emergency_contact_lname') ?>

    <?php // echo $form->field($model, 'taxpayer_emergency_contact_suffix_name') ?>

    <?php // echo $form->field($model, 'taxpayer_emergency_contact_relationship') ?>

    <?php // echo $form->field($model, 'taxpayer_emergency_contact_number') ?>

    <?php // echo $form->field($model, 'taxpayer_emergency_contact_email_address') ?>

    <?php // echo $form->field($model, 'taxpayer_birth_date') ?>

    <?php // echo $form->field($model, 'taxpayer_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
