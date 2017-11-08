<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RenewalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="renewal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'renewal_id') ?>

    <?= $form->field($model, 'renewal_status') ?>

    <?= $form->field($model, 'business_id') ?>

    <?= $form->field($model, 'business_name') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
