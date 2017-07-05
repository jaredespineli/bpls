<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BusinessSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="business-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'business_name') ?>

    <?= $form->field($model, 'trade_name') ?>

    <?= $form->field($model, 'president_name') ?>

    <?= $form->field($model, 'org_type') ?>

    <?php // echo $form->field($model, 'ein') ?>

    <?php // echo $form->field($model, 'tin') ?>

    <?php // echo $form->field($model, 'lob_code') ?>

    <?php // echo $form->field($model, 'lob_desc') ?>

    <?php // echo $form->field($model, 'capital_amount') ?>

    <?php // echo $form->field($model, 'tel_num') ?>

    <?php // echo $form->field($model, 'website_url') ?>

    <?php // echo $form->field($model, 'bldg_num') ?>

    <?php // echo $form->field($model, 'bldg_name') ?>

    <?php // echo $form->field($model, 'unit_num') ?>

    <?php // echo $form->field($model, 'street') ?>

    <?php // echo $form->field($model, 'subdivision') ?>

    <?php // echo $form->field($model, 'barangay') ?>

    <?php // echo $form->field($model, 'property_index_num') ?>

    <?php // echo $form->field($model, 'has_lessor') ?>

    <?php // echo $form->field($model, 'lessor_business_id') ?>

    <?php // echo $form->field($model, 'business_area') ?>

    <?php // echo $form->field($model, 'employee_count') ?>

    <?php // echo $form->field($model, 'sss_ref') ?>

    <?php // echo $form->field($model, 'sec_ref') ?>

    <?php // echo $form->field($model, 'dti_ref') ?>

    <?php // echo $form->field($model, 'cda_ref') ?>

    <?php // echo $form->field($model, 'fsic_ref') ?>

    <?php // echo $form->field($model, 'application_barcode') ?>

    <?php // echo $form->field($model, 'barangay_barcode') ?>

    <?php // echo $form->field($model, 'zoning_barcode') ?>

    <?php // echo $form->field($model, 'sanitary_barcode') ?>

    <?php // echo $form->field($model, 'occupancy_barcode') ?>

    <?php // echo $form->field($model, 'others_one_barcode') ?>

    <?php // echo $form->field($model, 'others_two_barcode') ?>

    <?php // echo $form->field($model, 'others_three_barcode') ?>

    <?php // echo $form->field($model, 'others_four_barcode') ?>

    <?php // echo $form->field($model, 'tax_payment_type') ?>

    <?php // echo $form->field($model, 'sys_entry_date') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'full_address') ?>

    <?php // echo $form->field($model, 'pay_mode') ?>

    <?php // echo $form->field($model, 'postal_code') ?>

    <?php // echo $form->field($model, 'business_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
