<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use kartik\mpdf\Pdf;
use app\models\Assessment;
use app\models\Payment;
use app\models\Business;
use app\models\Approval;

?>

<div class="business-permit">
    <table style= "font-family: \"Times New Roman\", Times, serif;
        border-collapse: collapse;        
        width: 100%;
        font-size: 12px;" >

    <tr>
        <td colspan="2"><br style="visibility:hidden"></td>
        <td colspan="2"><center><strong>REPUBLIC OF THE PHILIPPINES</strong></center></td> 
        <td colspan="5"><br style="visibility:hidden"></td>
    </tr>
    <tr>
        <td colspan="2"><br style="visibility:hidden"></td>
        <td colspan="2"><center><strong>PROVINCE OF CAVITE</strong></center></td>
        <td colspan="5"><br style="visibility:hidden"></td>
    </tr>
    <tr>
        <td colspan="2" style="background-color: #3232ff;"><br style="visibility:hidden"></td>
        <td colspan="2" style="background-color: #3232ff; font color: white;"><center><strong><h4>MUNICIPALITY OF INDANG</h4><strong></center></td>
        <td colspan="5" style="background-color: #3232ff;"><br style="visibility:hidden"></td>
    </tr>
    <tr>
        <td colspan="10"><br style="visibility:hidden"></td>
    </tr>
        <tr>
        <td colspan="10"><br style="visibility:hidden"></td>
    </tr>
    <tr>
        <td colspan="10"><br style="visibility:hidden"></td>
    </tr>
    <tr>
        <td colspan="1">PERMIT NO. </td>
        <td style="border-bottom: 1px solid;"><center><?php echo $model->permit_no ?></center></td>
        <td colspan="3"><br style="visibility:hidden"></td>
        <td colspan="2" style="border-bottom: 1px solid;">
            <center><?php
                $now = new \DateTime('now');
                $month_now = $now->format('M');
                $day_now = $now->format('d');
                $year_now = $now->format('Y');

                echo $month_now . " " . $day_now . ", " . $year_now;
            ?></center>
        </td>
        <td colspan="3"><br style="visibility:hidden"></td>
    </tr>
    <tr>
        <td colspan="5"><br style="visibility:hidden"></td>
        <td colspan="2"><center>DATE</center></td> 
        <td colspan="3"><br style="visibility:hidden"></td>
    </tr>
    <tr>
        <td colspan="10"><br style="visibility:hidden"></td>
    </tr>
    <tr>
        <td colspan="10"><br style="visibility:hidden"></td>
    </tr>
    <tr>
        <td colspan="1"><br style="visibility:hidden"></td>
        <td colspan="6" style = "font color: green;"><center><h3><strong>MAYOR'S PERMIT</strong></h3></center></td>
        <td colspan="3"><br style="visibility:hidden"></td> 
    </tr>
    <tr>
        <td colspan="10"><br style="visibility:hidden"></td>
    </tr>
    <tr>
        <td colspan="1"><br style="visibility:hidden"></td>
        <td colspan="7"><center>Pursuant to Chapter III, Article A. of the Revised Code of Indang, Cavite,</center></td>
        <td colspan="2"><br style="visibility:hidden"></td>
    </tr>
     <tr>
        <td colspan="2"><br style="visibility:hidden"></td>
        <td colspan="4"><center>a Mayor's Permit is hereby granted to</center></td>
        <td colspan="4"><br style="visibility:hidden"></td>
    </tr>
    <tr>
        <td colspan="10"><br style="visibility:hidden"></td>
    </tr>
    <tr>
        <td colspan="10"><br style="visibility:hidden"></td>
    </tr>
    <tr>
        <td colspan="2"><br style="visibility:hidden"></td>
        <td colspan="3" style="border-bottom: 1px solid;"><center><?php echo $model->business_name ?></center></td>
        <td colspan="5"><br style="visibility:hidden"></td>
    </tr>
    <tr>
        <td colspan="2"><br style="visibility:hidden"></td>
        <td colspan="3"><center>Business Name</center></td> 
        <td colspan="5"><br style="visibility:hidden"></td>
    </tr>
    <tr>
        <td colspan="10"><br style="visibility:hidden"></td>
    </tr>
    <tr>
        <td colspan="2"><br style="visibility:hidden"></td>
        <td colspan="3" style="border-bottom: 1px solid;"><center><?php echo $model->full_address = $model->bldg_num . ' ' .$model->bldg_name . ' ' .$model->unit_num . ' ' .$model->street . ' ' .$model->subdivision . ' ' .$model->barangay . ', ' ."Indang, Cavite"?></center></td>
        <td colspan="5"><br style="visibility:hidden"></td>
    </tr>
    <tr>
        <td colspan="2"><br style="visibility:hidden"></td>
        <td colspan="3"><center>Location / Address of Business</center></td> 
        <td colspan="5"><br style="visibility:hidden"></td>
    </tr>
    <tr>
        <td colspan="10"><br style="visibility:hidden"></td>
    </tr>
    <tr>
        <td colspan="2"><br style="visibility:hidden"></td>
        <td colspan="3" style="border-bottom: 1px solid;"><center><?php echo $model->president_name ?></center></td>
        <td colspan="5"><br style="visibility:hidden"></td>
    </tr>
    <tr>
        <td colspan="2"><br style="visibility:hidden"></td>
        <td colspan="3"><center>Proprietor / Operator Manager</center></td> 
        <td colspan="5"><br style="visibility:hidden"></td>
    </tr>
    <tr>
        <td colspan="10"><br style="visibility:hidden"></td>
    </tr>
    <tr>
        <td colspan="10"><br style="visibility:hidden"></td>
    </tr>
    <tr>
        <td colspan="2">to operate the business of </td>
        <td colspan="4" style="border-bottom: 1px solid;"><center><?php echo $model->president_name ?></center></td>
        <td colspan="4"><br style="visibility:hidden"></td>
    </tr>
    <tr>
        <td colspan="8">subject to existing laws, rules and regulations. This permit shall be valid until</td> 
        <td colspan="2"><br style="visibility:hidden"></td>
    </tr>
    <tr>
        <td colspan="1">December 31, </td>
        <td style="border-bottom: 1px solid;"><center><?php echo $modelApproval->next_renewal_date ?></center></td>
        <td colspan="3">, unless sooner revoked for a cause.</td>
        <td colspan="5"><br style="visibility:hidden"></td>
    </tr>
    <tr>
        <td colspan="10"><br style="visibility:hidden"></td>
    </tr>
    <tr>
        <td colspan="10"><br style="visibility:hidden"></td>
    </tr>
    <tr>
        <td colspan="10"><br style="visibility:hidden"></td>
    </tr>
    <tr>
        <td colspan="10"><br style="visibility:hidden"></td>
    </tr>
    <tr>
        <td colspan="4"><br style="visibility:hidden"></td>
        <td colspan="3" style = "background-image: img/seal.png"><center><?php echo $model->mayor_name?></center></td> 
        <td colspan="3"><br style="visibility:hidden"></td>
    </tr>
    <tr>
        <td colspan="4"><br style="visibility:hidden"></td>
        <td colspan="3"><center>Municipal Mayor</center></td> 
        <td colspan="3"><br style="visibility:hidden"></td>
    </tr>
    </table>
</div>
<br>
<div style="text-align: center; background-color: #3232ff; font color: white; padding-top:7px" class = "footer">
    <p><strong>THIS PERMIT SHALL BE POSTED CONSPICUOUSLY WITHIN THE ESTABLISHMENT</strong></p>
    <p><strong>WHERE SUCH BUSINESS IS BEING CONDUCTED AND SHALL BE PRESENTED</strong></p>
    <p><strong>TO COMPETENT AUTHORITY UPON DEMAND.</strong></p>
</div>