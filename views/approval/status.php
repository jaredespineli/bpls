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

$this->title = 'Business Approval Status';
$this->params['breadcrumbs'][] = $this->title;

$modelBusiness =  Business::find()
                ->where(['business_id' => $modelBusiness->business_id])
                ->one();
?>
<div class="business-verify">

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
                    if(is_null($modelPayment)){
                        echo "<td>" . Html::a('Pending', ['assessment/update', 'id' => $modelAssess->assessment_id], ['class' => 'btn btn-primary']) . "</td>";
                    }else{        
                         if(trim($modelPayment->payment_kind, " ") == 'Quarterly' || trim($modelPayment->payment_kind, " ") == 'Bi-Annually' || trim($modelPayment->payment_kind, " ") == 'Annually'){
                            echo "<td>". $modelPayment->payment_kind ."</td>";
                        }else{
                            echo "<td>" . Html::a('Pending', ['payment/paytable', 'id' => $modelPayment->assessment_id], ['class' => 'btn btn-primary']) . "</td>";
                        }
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

               </table>";          


echo "<br>";
echo "<br>";

            if(trim($model->approval_status, " ") == 'Approved'){ ?>                   
                        <?= Html::a('Generate Business Permit', ['business/generate'], ['class' => 'btn btn-primary']) ?>                    
                <?php }
            ?>
                        
</div>
