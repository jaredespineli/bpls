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

$this->title = $modelPayment->business_name;
$this->params['breadcrumbs'][] = ['label' => 'Official Receipt', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


?>

<div class="payment-option-quarter">


    <?php $form = ActiveForm::begin(); ?>
	
	<?php
        
        
        echo "Property Owner: <strong>" . $modelPayment->president_name . "</strong><br>";
        echo "<br>";        
        echo "<br>";

        echo "<table>
               <tr>                    
                    <th>Payment Kind</th>
                    <th>Quarter or Half</th>
                    <th>Assessed Value</th>                                                        
                </tr>";


        
            if(is_null($modelPayment->payment_quarter)){
                echo "<tr>";            
                echo "<td>" . $modelPayment->payment_kind . "</td>";
                echo "<td>" . $arrayQuarter[1]["payment_quarter"] . "</td>";           
                echo "<td>" . $arrayQuarter[1]["quarter_assessment"] . "</td>";                       
                echo "</tr>";
                $modelPayment->payment_quarter = 1;
                $modelPayment->save();
            }
                else{
                    // for($counter = 0; $counter < sizeof($arrayQuarter); $counter++){
                    //     for($i=0; $i<$modelPayment->payment_quarter+1; $i++){
                            if($modelPayment->payment_quarter < 4){
                                echo "<tr>";            
                                echo "<td>" . $modelPayment->payment_kind . "</td>";
                                echo "<td>" . $arrayQuarter[$modelPayment->payment_quarter+1]["payment_quarter"] . "</td>";           
                                echo "<td>" . $arrayQuarter[$modelPayment->payment_quarter+1]["quarter_assessment"] . "</td>";                       
                                echo "</tr>";
                                $modelPayment->payment_quarter = $modelPayment->payment_quarter+1;
                                $modelPayment->save();
                            }
                        // }
                    // }   
                }                
        echo "</table>"; 
        
?>    
    <br>
    <br>
	<?= $form->field($modelPayment, 'or_number')->textInput(['value' => $modelPayment->or_number]) ?>
	<?= $form->field($modelPayment, 'date')->textInput(['value' => $modelPayment->date]) ?>
	<?= $form->field($modelPayment, 'received_by')->textInput(['value' => $modelPayment->received_by]) ?>

    <div class="form-group">
        <?= Html::submitButton('Pay Now', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>