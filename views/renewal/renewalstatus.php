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
use yii\grid\GridView;
use yii\helpers\Url;
use app\models\Business;
use app\models\Document;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PaymentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Business Renewal Status';
$this->params['breadcrumbs'][] = $this->title;

$modelBusiness =  Business::find()
                ->where(['business_id' => $modelBusiness->business_id])
                ->one();
?>
<div class="renewal-status">

    <div>
        <h3><?= Html::encode('Business Name: ' . $this->title) ?></h3>
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
                    <th>Requirements</th>
                    <th>Status</th>                    
               </tr>
               <tr>                    
                    <td>Payment</td>";

                     if(trim($modelPayment->payment_status, " ") == 'Paid'){
                        echo "<td>". $modelPayment->payment_status ."</td>";
                    }else{
                        echo "<td>" . Html::a('Pending', ['payment/paytable', 'id' => $modelPayment->payment_id], ['class' => 'btn btn-primary']) . "</td>";
                    }
                    
                echo "</tr>

                <tr>                    
                    <td>Documents</td>";

                     if(trim($modelDoc->document_status, " ") == 'Approved'){
                        echo "<td>". $modelDoc->document_status ."</td>";
                    }else{
                        echo "<td>" . Html::a('Pending', ['business/verifydoc', 'id' => $modelDoc->document_id], ['class' => 'btn btn-primary']) . "</td>";
                    }
                    
                echo "</tr>

                <tr>                    
                    <td>Business Status</td>";

                        date_default_timezone_set('Asia/Manila');
                        $yearnow = date('Y');

                        if($modelApproval->next_renewal_date > $yearnow){
                            $modelBusiness->isActive = 0;
                            $modelBusiness->business_status = "Inactive";
                            echo "<td>". $modelBusiness->business_status ."</td>";
                        }else{
                            $modelBusiness->isActive = 1;
                            $modelBusiness->business_status = "Active";       
                            echo "<td>". $modelBusiness->business_status ."</td>";                                     
                        }
                    
                echo "</tr>

               </table>";          


echo "<br>";
echo "<br>";

            
                if((trim($modelPayment->payment_status, " ") == 'Paid') && trim($modelDoc->document_status, " ") == 'Approved'){?>                   
                        <?= Html::a('Renew Business Permit', ['renewal/generate'], ['class' => 'btn btn-primary']) ?>                    
                <?php }
            ?>

</div>
