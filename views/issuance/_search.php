<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IssuanceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="issuance-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'issuance_id') ?>

    <?= $form->field($model, 'approval_id') ?>

    <?= $form->field($model, 'business_reg_num') ?>

    <?= $form->field($model, 'full_business_name') ?>

    <?= $form->field($model, 'or_reference') ?>

    <?php // echo $form->field($model, 'or_reference_date') ?>

    <?php // echo $form->field($model, 'released_to') ?>

    <?php // echo $form->field($model, 'scheduled_release_date') ?>

    <?php // echo $form->field($model, 'actual_release_date') ?>

    <?php // echo $form->field($model, 'issuance_barcode_ref') ?>

    <?php // echo $form->field($model, 'issued_by_name') ?>

    <?php // echo $form->field($model, 'issuance_by_id') ?>

    <?php // echo $form->field($model, 'sys_entry_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
