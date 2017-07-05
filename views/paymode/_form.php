<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PayMode */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pay-mode-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pay_mode_id')->textInput() ?>

    <?= $form->field($model, 'due_date')->textInput() ?>

    <?= $form->field($model, 'or_num')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amount_due')->textInput() ?>

    <?= $form->field($model, 'payment_holder_id')->textInput() ?>

    <?= $form->field($model, 'amount_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
