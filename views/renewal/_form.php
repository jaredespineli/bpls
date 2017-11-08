<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Renewal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="renewal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'renewal_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'business_id')->textInput() ?>

    <?= $form->field($model, 'business_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
