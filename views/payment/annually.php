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
$this->params['breadcrumbs'][] = ['label' => 'Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="payment-annually-form">

	<div>
    	<h3><?= Html::encode('Statement of Account: ' . $this->title) ?></h3>
	</div>

    <div>
        <?php 
        if(trim($modelPayment->payment_status, " ") != 'Paid'){ ?>
           <p style="float: right;"> 
                <?= Html::a('Pay Now', ['annually', 'id' => $modelPayment->payment_id], ['class' => 'btn btn-primary'])?>             
           </p>
        <?php } ?>
    </div>

<br/>
<br/>
<br/>

	<?php
        
        //echo "Assessed Real Property Number: <strong>" . $model->arp_no . "</strong><br>";
        echo "Property Owner: <strong>" . $modelPayment->president_name . "</strong><br>";        

        echo "<table>
                <tr>                    
                    <th>Payment Kind</th>                    
                    <th>Total Amount</th>
                    <th>Payment Status</th>
                </tr>";

            echo "<tr>";            
            echo "<td>" . $modelPayment->payment_kind . "</td>";                    
            echo "<td>" . $modelPayment->grand_total . "</td>";
            echo "<td>" . $modelPayment->payment_status . "</td>";
            echo "</tr>";        

        echo "</table>"; 

        echo "<br>Grand Total: " . $modelPayment->grand_total;
?>

</div>