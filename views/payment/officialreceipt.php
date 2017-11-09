<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use kartik\mpdf\Pdf;
use app\models\Assessment;
use app\models\Payment;

$model_business = Assessment::find()
	->where(['assessment_id' => $model->assessment_id])
	->one();

$model_payment = Payment::find()
    ->where(['assessment_id' => $model->assessment_id])
    ->all();

$total_paid = 0;

for($i = 0; $i < sizeof($model_payment); $i++){
    $total_paid = $total_paid + $model_payment[$i]["assessed_value"];
}

$total_paid = $total_paid - $model->assessed_value;

$total_to_pay = $model->grand_total - $total_paid;

?>

<div class="official-receipt">

	<p style="text-align: center;">
		<strong>OFFICIAL RECEIPT</strong>
	</p>
	<br>
	<br>

	<table style="font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%; font-size: 12px;">

    <tr>
    	<td colspan="9"></td>
    	<td colspan="1">Receipt Number: </td>
    	<td colspan="3" style="border-bottom: 1px solid;"> <?php echo $model->or_number ?> </td>
    </tr>
    <tr>
     	<td colspan="9"></td>
    	<td colspan="1">Date: </td>
    	<td colspan="3" style="border-bottom: 1px solid;"> <?php echo $model->date ?> </td>
    </tr>
    <tr>
    	<td colspan="13"><br style="visibility:hidden"></td>
    </tr>
    <tr>
    	<td colspan="13"><br style="visibility:hidden"></td>
    </tr>
    <tr>
     	<td colspan="5">Received from</td>
    	<td colspan="5" style="border-bottom: 1px solid;"> <?php echo $model->business_name . " ( " . $model_business->president_name . " ) "; ?> </td>
    	<td colspan="1"> the amount of Php </td>
    	<td></td>
    	<td colspan="5" style="border-bottom: 1px solid;"> <?php echo $model->assessed_value ?> </td>
    </tr>
    <tr>
     	<td colspan="7">For</td>
    	<td colspan="2" style="border-bottom: 1px solid;">
    		<?php 
	    		if(trim($model->payment_kind, " ") == 'Annually'){
	    			echo "Year ". $model->year;
	    		}else if(trim($model->payment_kind, " ") == 'Bi-Annually'){
	    			if($model->payment_quarter == 0){
	    				echo "First Half of Year ". $model->year;
	    			}else if($model->payment_quarter == 1){
	    				echo "Second Half of Year ". $model->year;
	    			}else{
	    				//error - invalid payment_quarter
	    			}
	    		}else if(trim($model->payment_kind, " ") == 'Quarterly'){
	    			if($model->payment_quarter == 0){
	    				echo "First Quarter of Year ". $model->year;
	    			}else if($model->payment_quarter == 1){
	    				echo "Second Quarter of Year ". $model->year;
	    			}else if($model->payment_quarter == 2){
	    				echo "Third Quarter of Year ". $model->year;
	    			}else if($model->payment_quarter == 3){
	    				echo "Forth Quarter of Year ". $model->year;
	    			}else{
	    				//error - invalid payment_quarter
	    			}
	    		}else{
	    			//error - invalid $model->payment_kind
	    		}
    		?>
    	</td>
    </tr>
    <tr>
    	<td colspan="13"><br style="visibility:hidden"></td>
    </tr>
    <tr>
    	<td colspan="13"><br style="visibility:hidden"></td>
    </tr>
    <tr>
     	<td colspan="7">Current Balance: Php </td>
    	<td colspan="2" style="border-bottom: 1px solid;"> <?php echo $total_to_pay ?> </td>
    </tr>
    <tr>
     	<td colspan="7">Payment Amount: Php </td>
    	<td colspan="2" style="border-bottom: 1px solid;"> <?php echo $model->assessed_value ?> </td>
    </tr>
    <tr>
     	<td colspan="7">Balance Due: Php </td>
    	<td colspan="2" style="border-bottom: 1px solid;"> <?php echo ($total_to_pay - $model->assessed_value) ?> </td>
    </tr>
    <tr>
    	<td colspan="13"><br style="visibility:hidden"></td>
    </tr>
    <tr>
    	<td colspan="13"><br style="visibility:hidden"></td>
    </tr>
    <tr>
     	<td colspan="7">Received By: </td>
    	<td colspan="2" style="border-bottom: 1px solid;"> <?php echo $model->received_by ?> </td>
    </tr>

    </table>

</div>