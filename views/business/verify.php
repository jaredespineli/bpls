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
use app\models\Document;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PaymentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Document Verification';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="business-verify">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
   
    

    <?php
        echo "<table>
        <tr>                    
                    <th>Business Name</th>
                    <th>Document Status</th>  
                    <th>Action</th>                    
        </tr>";
        

        for($i = 0; $i < sizeof($modelVerify); $i++ ){
            //echo $modelVerify[$i]->business_name;
            $doc = Document::find()
                ->where(['business_id' => $modelVerify[$i]["business_id"]])
                ->one();

            echo " <tr>                    
                <td> " . $modelVerify[$i]["business_name"] ."</td>
                <td>"  . $doc->document_status ."</td>
                <td>";
            ?>
                <?= Html::a('Change Status', ['verifydoc', 'id' => $doc->document_id], ['class' => 'btn btn-primary'])?>
            <?php echo "</td>
            </tr>";        
        }   

        echo "</table>";     
    ?>
</div>
