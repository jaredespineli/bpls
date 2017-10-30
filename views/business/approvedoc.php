<style type="text/css">
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: center;
        padding: 2px;
    }
</style>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Payment */
/* @var $form yii\widgets\ActiveForm */

$this->title = $modelBusiness->business_name;
$this->params['breadcrumbs'][] = ['label' => 'Document Approval', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

<div class="business-approvedoc-form">
    
    <?php $form = ActiveForm::begin(); ?>
    
    <?php
        echo "Property Owner: <strong>" . $modelBusiness->president_name . "</strong><br>";
        echo "<br>";        
        echo "<br>";

        <br>
        <br>
        <?= $form->field($modelBusiness, 'or_number')->textInput(['value' => $modelPayment->or_number]) ?>
        <?= $form->field($modelBusiness, 'date')->textInput(['value' => $modelPayment->date]) ?>
        <?= $form->field($modelBusiness, 'received_by')->textInput(['value' => $modelPayment->received_by]) ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>