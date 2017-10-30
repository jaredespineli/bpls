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
use app\models\Business;

/* @var $this yii\web\View */
/* @var $model app\models\Payment */

$modelBusiness = Business::find()
    ->where(['business_id' => $modelVerify->business_id])
    ->one();

$this->title = $modelBusiness->business_name;
$this->params['breadcrumbs'][] = ['label' => 'Document Verification', 'url' => ['verify']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="business-verifydoc-form">

<div>
    <h3><?= Html::encode('List of Documents: ' . $this->title) ?></h3>
</div>

<br/>
<br/>
<br/>

<div>

<?php

        //echo "Assessed Real Property Number: <strong>" . $model->arp_no . "</strong><br>";
        echo "Property Owner: <strong>" . $modelBusiness->president_name . "</strong><br>";        

        echo "<table>
               <tr>                    
                    <th>Documents</th>
                    <th>Status</th>                    
               </tr>
               <tr>                    
                    <td>Barangay Clearance</td>";

                     if(trim($modelVerify->barangay_clearance, " ") == 'Approved'){
                        echo "<td>". $modelVerify->barangay_clearance ."</td>";
                    }else{
                        echo "<td>" . Html::a('Approve', ['approvedoc', 'id' => $modelVerify->document_id], ['class' => 'btn btn-primary']) . "</td>";
                    }
                    
                echo "</tr>
                <tr>
                    <td>Zoning Clearance</td>";
                    
                    if(trim($modelVerify->zoning_clearance, " ") == 'Approved'){
                        echo "<td>". $modelVerify->zoning_clearance ."</td>";
                    }else{
                        echo "<td>" . Html::a('Approve', ['approvedoc', 'id' => $modelVerify->document_id], ['class' => 'btn btn-primary']) . "</td>";
                    }

                echo "</tr>
                <tr>
                    <td>Sanitary Clearance</td>";

                    if(trim($modelVerify->sanitary_clearance, " ") == 'Approved'){
                        echo "<td>". $modelVerify->sanitary_clearance ."</td>";
                    }else{
                        echo "<td>" . Html::a('Approve', ['approvedoc', 'id' => $modelVerify->document_id], ['class' => 'btn btn-primary']) . "</td>";
                    }

                echo "</tr>
                <tr>
                    <td>Occupancy Permit</td>";

                    if(trim($modelVerify->occupancy_permit, " ") == 'Approved'){
                        echo "<td>". $modelVerify->occupancy_permit ."</td>";
                    }else{
                        echo "<td>" . Html::a('Approve', ['approvedoc', 'id' => $modelVerify->document_id], ['class' => 'btn btn-primary']) . "</td>";
                    }

                echo "</tr>
                <tr>
                    <td>Fire Safety Inspection Certificate</td>";

                    if(trim($modelVerify->fire_safety, " ") == 'Approved'){
                        echo "<td>". $modelVerify->fire_safety ."</td>";
                    }else{
                        echo "<td>" . Html::a('Approve', ['approvedoc', 'id' => $modelVerify->document_id], ['class' => 'btn btn-primary']) . "</td>";
                    }

                echo "</tr>";

        echo "</table>";  

        //also ok na to. di ko pa lang naayos yung para malaman kung anong doc yung ichange from disapproved to approved.
        //di pa din ok yung view na approvedoc
?>

</div>

