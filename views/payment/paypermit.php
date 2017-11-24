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
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Payment */
/* @var $form yii\widgets\ActiveForm */

$this->title = $model->business_name;
$this->params['breadcrumbs'][] = ['label' => 'Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Payment', 'url' => ['paytable', 'id' => $model->payment_id]];
$this->params['breadcrumbs'][] = $this->title;


?>

<div class="payment-option-quarter">


    <?php $form = ActiveForm::begin(); ?>
    
    <?php
        
        
        echo "Property Owner: <strong>" . $model->president_name . "</strong><br>";
        echo "<br>";        
        echo "<br>";

        echo "<table>
               <tr>                    
                    <th>Payment Kind</th>
                    <th>Quarter or Half</th>
                    <th>Assessed Value</th>                                                        
                </tr>";


        
            
                echo "<tr>";            
                echo "<td>" . $model->payment_kind . "</td>";
                echo "<td>" . ($model->payment_quarter + 1) . "</td>";           
                echo "<td>" . $model->assessed_value . "</td>";                       
                echo "</tr>";
                        
        echo "</table>"; 
        
?>    
    <br>
    <br>
    <?= $form->field($model, 'or_number')->textInput(['value' => $model->or_number]) ?>    
    <?php echo $form->field($model, 'date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter payment date ...'],
        'pluginOptions' => [
            'autoclose'=>true
        ]
      ]); ?>
    <?= $form->field($model, 'received_by')->textInput(['readonly' => true, 'value' => trim(Yii::$app->user->identity->full_name, " ")]) ?>
    <?= $form->field($model, 'officialreceipt')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Pay Now',['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>