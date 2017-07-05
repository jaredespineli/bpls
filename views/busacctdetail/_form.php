<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BusAcctDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bus-acct-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'account_detail_id')->textInput() ?>

    <?= $form->field($model, 'account_holder_id')->textInput() ?>

    <?= $form->field($model, 'pay_mode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'capital_amount')->textInput() ?>

    <?= $form->field($model, 'gross_sales_tax')->textInput() ?>

    <?= $form->field($model, 'gross_sales_tax_amt')->textInput() ?>

    <?= $form->field($model, 'gross_sales_tax_pnl')->textInput() ?>

    <?= $form->field($model, 'transport_truck_tax')->textInput() ?>

    <?= $form->field($model, 'transport_truck_tax_amt')->textInput() ?>

    <?= $form->field($model, 'transport_truck_tax_pnl')->textInput() ?>

    <?= $form->field($model, 'sign_billboard_tax')->textInput() ?>

    <?= $form->field($model, 'sign_billboard_tax_amt')->textInput() ?>

    <?= $form->field($model, 'sign_billboard_tax_pnl')->textInput() ?>

    <?= $form->field($model, 'mayors_permit_fee')->textInput() ?>

    <?= $form->field($model, 'mayors_permit_fee_amt')->textInput() ?>

    <?= $form->field($model, 'mayors_permit_fee_pnl')->textInput() ?>

    <?= $form->field($model, 'garbage_fee')->textInput() ?>

    <?= $form->field($model, 'garbage_fee_amt')->textInput() ?>

    <?= $form->field($model, 'garbage_fee_pnl')->textInput() ?>

    <?= $form->field($model, 'truck_van_permit_fee')->textInput() ?>

    <?= $form->field($model, 'truck_van_permit_fee_amt')->textInput() ?>

    <?= $form->field($model, 'truck_van_permit_fee_pnl')->textInput() ?>

    <?= $form->field($model, 'sanitary_permit_fee')->textInput() ?>

    <?= $form->field($model, 'sanitary_permit_fee_amt')->textInput() ?>

    <?= $form->field($model, 'sanitary_permit_fee_pnl')->textInput() ?>

    <?= $form->field($model, 'bldg_insp_fee')->textInput() ?>

    <?= $form->field($model, 'bldg_insp_fee_pnl')->textInput() ?>

    <?= $form->field($model, 'bldg_insp_fee_amt')->textInput() ?>

    <?= $form->field($model, 'elec_insp_fee')->textInput() ?>

    <?= $form->field($model, 'elec_insp_fee_amt')->textInput() ?>

    <?= $form->field($model, 'elec_insp_fee_pnl')->textInput() ?>

    <?= $form->field($model, 'mech_insp_fee')->textInput() ?>

    <?= $form->field($model, 'mech_insp_fee_amt')->textInput() ?>

    <?= $form->field($model, 'mech_insp_fee_pnl')->textInput() ?>

    <?= $form->field($model, 'plumb_insp_fee')->textInput() ?>

    <?= $form->field($model, 'plumb_insp_fee_amt')->textInput() ?>

    <?= $form->field($model, 'plumb_insp_fee_pnl')->textInput() ?>

    <?= $form->field($model, 'sign_billboard_fee')->textInput() ?>

    <?= $form->field($model, 'sign_billboard_fee_amt')->textInput() ?>

    <?= $form->field($model, 'sign_billboard_fee_pnl')->textInput() ?>

    <?= $form->field($model, 'sign_billboard_renew_fee')->textInput() ?>

    <?= $form->field($model, 'sign_billboard_renew_fee_amt')->textInput() ?>

    <?= $form->field($model, 'sign_billboard_renew_fee_pnl')->textInput() ?>

    <?= $form->field($model, 'hazard_storage_fee')->textInput() ?>

    <?= $form->field($model, 'hazard_storage_fee_amt')->textInput() ?>

    <?= $form->field($model, 'hazard_storage_fee_pnl')->textInput() ?>

    <?= $form->field($model, 'bfp_fee')->textInput() ?>

    <?= $form->field($model, 'bfp_fee_amt')->textInput() ?>

    <?= $form->field($model, 'bfp_fee_pnl')->textInput() ?>

    <?= $form->field($model, 'grand_total')->textInput() ?>

    <?= $form->field($model, 'sys_entry_date')->textInput() ?>

    <?= $form->field($model, 'hazard_storage_tax')->textInput() ?>

    <?= $form->field($model, 'hazard_storage_tax_amt')->textInput() ?>

    <?= $form->field($model, 'hazard_storage_tax_pnl')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
