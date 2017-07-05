<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProgressSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="progress-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'progress_id') ?>

    <?= $form->field($model, 'business_information') ?>

    <?= $form->field($model, 'documents') ?>

    <?= $form->field($model, 'assessment') ?>

    <?= $form->field($model, 'payment') ?>

    <?php // echo $form->field($model, 'approval') ?>

    <?php // echo $form->field($model, 'account_holder_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
