<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Issuance */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="issuance-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'issuance_id')->textInput() ?>

    <?= $form->field($model, 'approval_id')->textInput() ?>

    <?= $form->field($model, 'business_reg_num')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'full_business_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'or_reference')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'or_reference_date')->textInput() ?>

    <?= $form->field($model, 'released_to')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'scheduled_release_date')->textInput() ?>

    <?= $form->field($model, 'actual_release_date')->textInput() ?>

    <?= $form->field($model, 'issuance_barcode_ref')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'issued_by_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'issuance_by_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sys_entry_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
