<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PayModeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pay-mode-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pay_mode_id') ?>

    <?= $form->field($model, 'due_date') ?>

    <?= $form->field($model, 'or_num') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'amount_due') ?>

    <?php // echo $form->field($model, 'payment_holder_id') ?>

    <?php // echo $form->field($model, 'amount_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
