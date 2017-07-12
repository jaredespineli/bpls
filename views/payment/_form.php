<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Payment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'payment_id')->textInput(['readonly' => true, 'value' => $model->payment_id]) ?>
    <?= $form->field($model, 'assessment_id')->textInput(['readonly' => true, 'value' => $model->assessment_id]) ?>
    <?= $form->field($model, 'grand_total')->textInput() ?>
    <?= $form->field($model, 'or_number')->textInput() ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Pay Now', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
