<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Payment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payment-option-biannually">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($modelPayment, 'payment_bi_annually')->radioList(array('1'=>'First Half', '2'=>'Second Half')); ?>

    <div class="form-group">
        <?= Html::submitButton('Pay Now', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>