<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use kartik\mpdf\Pdf;
use app\models\Assessment;
use app\models\Payment;

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
        <td colspan="2"><br style="visibility:hidden"></td>
        <td colspan="2"><center><strong>MUNICIPALITY OF INDANG</strong></center></td>
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
        <td colspan="6"><center><strong>MAYOR'S PERMIT</strong></center></td>
        <td colspan="3"><br style="visibility:hidden"></td> 
    </tr>
    <tr>
        <td colspan="10"><br style="visibility:hidden"></td>
    </tr>
    <tr>
        <td colspan="1"><br style="visibility:hidden"></td>
        <td colspan="7">Pursuant to Chapter III, Article A. of the Revised Code of Indang, Cavite,</td>
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
        <td colspan="3" style="border-bottom: 1px solid;"><center><?php echo $model->full_address ?></center></td>
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
        <td colspan="10"><br style="visibility:hidden"></td>
    </tr>
    <tr>
        <td colspan="4"><br style="visibility:hidden"></td>
        <td colspan="3"><center>PERFECTO V. FIDEL</center></td> 
        <td colspan="3"><br style="visibility:hidden"></td>
    </tr>
    <tr>
        <td colspan="4"><br style="visibility:hidden"></td>
        <td colspan="3"><center>Municipal Mayor</center></td> 
        <td colspan="3"><br style="visibility:hidden"></td>
    </tr>
    </table>
</div>