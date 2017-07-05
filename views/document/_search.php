<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DocumentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="document-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'document_id') ?>

    <?= $form->field($model, 'barangay_clearance') ?>

    <?= $form->field($model, 'barangay_status') ?>

    <?= $form->field($model, 'zoning_clearance') ?>

    <?= $form->field($model, 'zoning_status') ?>

    <?php // echo $form->field($model, 'sanitary_clearance') ?>

    <?php // echo $form->field($model, 'sanitary_status') ?>

    <?php // echo $form->field($model, 'occupancy_permit') ?>

    <?php // echo $form->field($model, 'occupancy_status') ?>

    <?php // echo $form->field($model, 'fire_safety') ?>

    <?php // echo $form->field($model, 'fire_safety_status') ?>

    <?php // echo $form->field($model, 'file_path') ?>

    <?php // echo $form->field($model, 'sys_entry_date') ?>

    <?php // echo $form->field($model, 'account_holder_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
