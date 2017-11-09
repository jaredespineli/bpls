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
use yii\widgets\DetailView;
use app\models\Payment;

/* @var $this yii\web\View */
/* @var $model app\models\Payment */

$this->title = $modelPayment[0]["business_name"];
$this->params['breadcrumbs'][] = ['label' => 'Statements of Account', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="payment-quarterly-form">

<div>
    <h3><?= Html::encode('Statement of Account: ' . $this->title) ?></h3>
</div>

<div>
    <p style="float: right;">
        <?php 
            if(trim($modelPayment[0]["payment_status"], " ") == 'Pending'){ 

                for($i = 0; $i < sizeof($modelPayment); $i++){
                    if(trim($modelPayment[$i]["payment_status_per"], " ") == 'Pending'){
                        $payment_id = $modelPayment[$i]["payment_id"];
                        ?>
                        <?= Html::a('Pay Now', ['paypermit', 'id' => $payment_id], ['class' => 'btn btn-primary']) ?>
                        <?php 
                        break;
                    }
                }   
        
                
        
            }
        ?>   
    </p>
</div>

<br/>
<br/>
<br/>

<div>

<?php
        
        //echo "Assessed Real Property Number: <strong>" . $model->arp_no . "</strong><br>";
        echo "Property Owner: <strong>" . $modelPayment[0]["president_name"] . "</strong><br>";        

        echo "<table>
               <tr>                    
                    <th>Payment Kind</th>
                    <th>Quarter or Half</th>
                    <th>Assessed Value</th>
                    <th>Received By</th>   
                    <th>Date Received</th>                                    
                    <th>Payment Status</th>
                </tr>";


        for($counter = 0; $counter < sizeof($modelPayment); $counter++){
            echo "<tr>";            
            echo "<td>" . $modelPayment[$counter]["payment_kind"] . "</td>";
            echo "<td>" . ($modelPayment[$counter]["payment_quarter"]+1) . "</td>";           
            echo "<td>" . $modelPayment[$counter]["assessed_value"] . "</td>";
            echo "<td>" . $modelPayment[$counter]["received_by"] . "</td>";
            echo "<td>" . $modelPayment[$counter]["date"] . "</td>";
            echo "<td>" . $modelPayment[$counter]["payment_status_per"] . "</td>";
            echo "</tr>";
        }

        echo "</table>"; 

        
?>

</div>