<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Payment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payment-option-quarter">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($modelPayment, 'payment_quarter')->radioList(array('1'=>'First Quarter', '2'=>'Second Quarter', '3'=>'Third Quarter', '4' => 'Fourth Quarter')); ?>

    <div class="form-group">
        <?= Html::submitButton('Pay Now', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>