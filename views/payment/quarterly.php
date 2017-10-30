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

$this->title = $modelPayment->business_name;
$this->params['breadcrumbs'][] = ['label' => 'Statements of Account', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="payment-quarterly-form">

<div>
    <h3><?= Html::encode('Statement of Account: ' . $this->title) ?></h3>
</div>

<div>

    <p style="float: right;">
        <?= Html::a('Pay Now', ['payoptionqu', 'id' => $modelPayment->payment_id], ['class' => 'btn btn-primary']) ?>   
    </p>
</div>

<br/>
<br/>
<br/>

<div>

<?php
        
        //echo "Assessed Real Property Number: <strong>" . $model->arp_no . "</strong><br>";
        echo "Property Owner: <strong>" . $modelPayment->president_name . "</strong><br>";        

        echo "<table>
               <tr>                    
                    <th>Payment Kind</th>
                    <th>Quarter or Half</th>
                    <th>Assessed Value</th>                                    
                    <th>Payment Status</th>
                </tr>";


        for($counter = 0; $counter < sizeof($arrayQuarter); $counter++){
            echo "<tr>";            
            echo "<td>" . $modelPayment->payment_kind . "</td>";
            echo "<td>" . $arrayQuarter[$counter]["payment_quarter"] . "</td>";           
            echo "<td>" . $arrayQuarter[$counter]["quarter_assessment"] . "</td>";            
            echo "<td>" . $arrayQuarter[$counter]["payment_status"] . "</td>";
            echo "</tr>";
        }

        echo "</table>"; 

        echo "<br>Grand Total: " . $modelPayment->grand_total;
?>

</div>