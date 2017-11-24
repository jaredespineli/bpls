<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Assessment */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="assessment-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>
    
    <?= $form->field($model, 'capital_amount')->textInput(['readonly' => true, 'value' => $model->capital_amount]) ?>

    <?= $form->field($model, 'gross_sales_tax_amt')->textInput() ?>

    <?= $form->field($model, 'gross_sales_tax_pnl')->textInput() ?>

    <?= $form->field($model, 'transport_truck_tax_amt')->textInput() ?>

    <?= $form->field($model, 'transport_truck_tax_pnl')->textInput() ?>

    <?= $form->field($model, 'hazard_storage_tax_amt')->textInput() ?>

    <?= $form->field($model, 'hazard_storage_tax_pnl')->textInput() ?>

    <?= $form->field($model, 'sign_billboard_tax_amt')->textInput() ?>

    <?= $form->field($model, 'sign_billboard_tax_pnl')->textInput() ?>

    <?= $form->field($model, 'mayors_permit_fee_amt')->textInput() ?>

    <?= $form->field($model, 'mayors_permit_fee_pnl')->textInput() ?>

    <?= $form->field($model, 'garbage_fee_amt')->textInput() ?>

    <?= $form->field($model, 'garbage_fee_pnl')->textInput() ?>

    <?= $form->field($model, 'truck_van_permit_fee_amt')->textInput() ?>

    <?= $form->field($model, 'truck_van_permit_fee_pnl')->textInput() ?>

    <?= $form->field($model, 'sanitary_permit_fee_amt')->textInput() ?>

    <?= $form->field($model, 'sanitary_permit_fee_pnl')->textInput() ?>

    <?= $form->field($model, 'bldg_insp_fee_amt')->textInput() ?>

    <?= $form->field($model, 'bldg_insp_fee_pnl')->textInput() ?>

    <?= $form->field($model, 'elec_insp_fee_amt')->textInput() ?>

    <?= $form->field($model, 'elec_insp_fee_pnl')->textInput() ?>

    <?= $form->field($model, 'mech_insp_fee_amt')->textInput() ?>

    <?= $form->field($model, 'mech_insp_fee_pnl')->textInput() ?>

    <?= $form->field($model, 'plumb_insp_fee_amt')->textInput() ?>

    <?= $form->field($model, 'plumb_insp_fee_pnl')->textInput() ?>

    <?= $form->field($model, 'sign_billboard_fee_amt')->textInput() ?>

    <?= $form->field($model, 'sign_billboard_fee_pnl')->textInput() ?>

    <?= $form->field($model, 'sign_billboard_renew_fee_amt')->textInput() ?>

    <?= $form->field($model, 'sign_billboard_renew_fee_pnl')->textInput() ?>

    <?= $form->field($model, 'hazard_storage_fee_amt')->textInput() ?>

    <?= $form->field($model, 'hazard_storage_fee_pnl')->textInput() ?>

    <?= $form->field($model, 'bfp_fee_amt')->textInput() ?>

    <?= $form->field($model, 'bfp_fee_pnl')->textInput() ?>

    <?= $form->field($model, 'business_tax')->textInput() ?>

    <?= $form->field($model, 'environmental_fee')->textInput() ?>

    <?= $form->field($model, 'business_plate')->textInput() ?>

    <?= $form->field($model, 'liquor')->textInput() ?>

    <?= $form->field($model, 'tobacco')->textInput() ?>

    <?= $form->field($model, 'health_card')->textInput() ?>

    <?= $form->field($model, 'medical_fee')->textInput() ?>

    <?php echo $form->field($model, 'assessment_date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter assessment date ...'],
        'pluginOptions' => [
            'autoclose'=>true
        ]
      ]); ?>
              <br>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
