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

    <?= $form->field($model, 'document_status') ?>

    <?= $form->field($model, 'business_id') ?>

    <?= $form->field($model, 'received_by') ?>

    <?= $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'barangay_clearance_status') ?>

    <?php // echo $form->field($model, 'zoning_clearance_status') ?>

    <?php // echo $form->field($model, 'sanitary_clearance_status') ?>

    <?php // echo $form->field($model, 'occupancy_permit_status') ?>

    <?php // echo $form->field($model, 'fire_safety_status') ?>

    <?php // echo $form->field($model, 'barangay_clearance_reason') ?>

    <?php // echo $form->field($model, 'zoning_clearance_reason') ?>

    <?php // echo $form->field($model, 'sanitary_clearance_reason') ?>

    <?php // echo $form->field($model, 'occupancy_permit_reason') ?>

    <?php // echo $form->field($model, 'fire_safety_reason') ?>

    <?php // echo $form->field($model, 'barangay_clearance_received_by') ?>

    <?php // echo $form->field($model, 'zoning_clearance_received_by') ?>

    <?php // echo $form->field($model, 'sanitary_clearance_received_by') ?>

    <?php // echo $form->field($model, 'occupancy_permit_received_by') ?>

    <?php // echo $form->field($model, 'fire_safety_received_by') ?>

    <?php // echo $form->field($model, 'barangay_clearance_date') ?>

    <?php // echo $form->field($model, 'zoning_clearance_date') ?>

    <?php // echo $form->field($model, 'sanitary_clearance_date') ?>

    <?php // echo $form->field($model, 'occupancy_permit_date') ?>

    <?php // echo $form->field($model, 'fire_safety_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
