<?php

use yii\helpers\Html;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Business */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="business-form" >

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>   

    <?= $form->field($model, 'business_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'trade_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'president_name')->textInput(['maxlength' => true]) ?>

   
    <?php echo $form->field($model, 'org_type')->widget(Select2::classname(), [
        'data' => $modelBusinessType,
        'options' => ['placeholder' => 'Select a business type ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?= $form->field($model, 'ein')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lob_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lob_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'capital_amount')->textInput() ?>

    <?= $form->field($model, 'tel_num')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'website_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bldg_num')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bldg_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'unit_num')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'street')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subdivision')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'barangay')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'property_index_num')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lessor_business_id')->textInput() ?>

    <?= $form->field($model, 'business_area')->textInput() ?>

    <?= $form->field($model, 'employee_count')->textInput() ?>

    <?= $form->field($model, 'sss_ref')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sec_ref')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dti_ref')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cda_ref')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fsic_ref')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'application_barcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'barangay_barcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zoning_barcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sanitary_barcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'occupancy_barcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'others_one_barcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'others_two_barcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'others_three_barcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'others_four_barcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tax_payment_type')->radioList(array('Quarterly'=>'Quarterly', 'Bi-Annually'=>'Bi-Annually', 'Annually'=>'Annually')); ?>

    
        

    <?= $form->field($model, 'pay_mode')->radioList(array('Quarterly'=>'Quarterly', 'Bi-Annually'=>'Bi-Annually', 'Annually'=>'Annually')); ?>

    <?= $form->field($model, 'postal_code')->textInput(['maxlength' => true]) ?>

   <?php echo $form->field($model, 'sys_entry_date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter entry date ...'],
        'pluginOptions' => [
            'autoclose'=>true
        ]
      ]); ?>

    <br>
    <br>

    <div class="form-group" >
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
