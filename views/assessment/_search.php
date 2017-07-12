<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AssessmentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="assessment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'assessment_id') ?>

    <?= $form->field($model, 'capital_amount') ?>

    <?= $form->field($model, 'gross_sales_tax_amt') ?>

    <?= $form->field($model, 'gross_sales_tax_pnl') ?>

    <?= $form->field($model, 'transport_truck_tax_amt') ?>

    <?php // echo $form->field($model, 'transport_truck_tax_pnl') ?>

    <?php // echo $form->field($model, 'hazard_storage_tax_amt') ?>

    <?php // echo $form->field($model, 'hazard_storage_tax_pnl') ?>

    <?php // echo $form->field($model, 'sign_billboard_tax_amt') ?>

    <?php // echo $form->field($model, 'sign_billboard_tax_pnl') ?>

    <?php // echo $form->field($model, 'mayors_permit_fee_amt') ?>

    <?php // echo $form->field($model, 'mayors_permit_fee_pnl') ?>

    <?php // echo $form->field($model, 'garbage_fee_amt') ?>

    <?php // echo $form->field($model, 'garbage_fee_pnl') ?>

    <?php // echo $form->field($model, 'truck_van_permit_fee_amt') ?>

    <?php // echo $form->field($model, 'truck_van_permit_fee_pnl') ?>

    <?php // echo $form->field($model, 'sanitary_permit_fee_amt') ?>

    <?php // echo $form->field($model, 'sanitary_permit_fee_pnl') ?>

    <?php // echo $form->field($model, 'bldg_insp_fee_amt') ?>

    <?php // echo $form->field($model, 'bldg_insp_fee_pnl') ?>

    <?php // echo $form->field($model, 'elec_insp_fee_amt') ?>

    <?php // echo $form->field($model, 'elec_insp_fee_pnl') ?>

    <?php // echo $form->field($model, 'mech_insp_fee_amt') ?>

    <?php // echo $form->field($model, 'mech_insp_fee_pnl') ?>

    <?php // echo $form->field($model, 'plumb_insp_fee_amt') ?>

    <?php // echo $form->field($model, 'plumb_insp_fee_pnl') ?>

    <?php // echo $form->field($model, 'sign_billboard_fee_amt') ?>

    <?php // echo $form->field($model, 'sign_billboard_fee_pnl') ?>

    <?php // echo $form->field($model, 'sign_billboard_renew_fee_amt') ?>

    <?php // echo $form->field($model, 'sign_billboard_renew_fee_pnl') ?>

    <?php // echo $form->field($model, 'hazard_storage_fee_amt') ?>

    <?php // echo $form->field($model, 'hazard_storage_fee_pnl') ?>

    <?php // echo $form->field($model, 'bfp_fee_amt') ?>

    <?php // echo $form->field($model, 'bfp_fee_pnl') ?>

    <?php // echo $form->field($model, 'assessment_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
