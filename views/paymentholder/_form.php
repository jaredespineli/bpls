<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PaymentHolder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payment-holder-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'payment_holder_id')->textInput() ?>

    <?= $form->field($model, 'account_holder_id')->textInput() ?>

    <?= $form->field($model, 'business_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
