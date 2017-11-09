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
    <?= $form->field($model, 'grand_total')->textInput(['readonly' => true, 'value' => $model->grand_total]) ?>
    <?= $form->field($model, 'year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'payment_kind')->radioList(array('Quarterly'=>'Quarterly', 'Bi-Annually'=>'Bi-Annually', 'Annually'=>'Annually')); ?>

    <div class="form-group">
        <?= Html::submitButton('Pay Now', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
