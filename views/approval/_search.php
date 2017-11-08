<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ApprovalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="approval-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'approval_id') ?>

    <?= $form->field($model, 'sic_code') ?>

    <?= $form->field($model, 'property_index_code') ?>

    <?= $form->field($model, 'postal_code') ?>

    <?= $form->field($model, 'full_business_name') ?>

    <?php // echo $form->field($model, 'remarks') ?>

    <?php // echo $form->field($model, 'approval_status') ?>

    <?php // echo $form->field($model, 'business_reg_num') ?>

    <?php // echo $form->field($model, 'action_date') ?>

    <?php // echo $form->field($model, 'approval_date') ?>

    <?php // echo $form->field($model, 'issue_date') ?>

    <?php // echo $form->field($model, 'next_renewal_date') ?>

    <?php // echo $form->field($model, 'sys_entry_date') ?>

    <?php // echo $form->field($model, 'account_holder_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
