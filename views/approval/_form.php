<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Approval */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="approval-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'approval_id')->textInput() ?>

    <?= $form->field($model, 'sic_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'property_index_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'postal_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'full_business_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remarks')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'approval_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'business_reg_num')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'action_date')->textInput() ?>

    <?= $form->field($model, 'approval_date')->textInput() ?>

    <?= $form->field($model, 'issue_date')->textInput() ?>

    <?= $form->field($model, 'next_renewal_date')->textInput() ?>

    <?= $form->field($model, 'sys_entry_date')->textInput() ?>

    <?= $form->field($model, 'account_holder_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
