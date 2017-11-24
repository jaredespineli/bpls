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
use app\models\Business;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Payment */
/* @var $form yii\widgets\ActiveForm */

$modelBusiness = Business::find()
    ->where(['business_id' => $modelVerify->business_id])
    ->one();

$this->title = $modelBusiness->business_name;
$this->params['breadcrumbs'][] = ['label' => 'Document Approval', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="business-approvedoc-form">
    
    <?php $form = ActiveForm::begin(); ?>

    <?php
        echo "Property Owner: <strong>" . $modelBusiness->president_name . "</strong><br>";
        
             echo "<table>
                       <tr>                    
                            <th>Documents</th>
                            <th>Status</th>
                            <th>Reasons</th>  
                            <th>Document Upload</th>                  
                       </tr>  
                       
                       <tr>
                            <td>Barangay Clearance</td>
                            <td><br>";?> <?= $form->field($modelVerify, 'barangay_clearance_status')->radioList(array('Approved'=>'Approved', 'Pending'=>'Pending'))->label(false); ?> </td>                            
                 <?php echo "<td>";?> <br> <?= $form->field($modelVerify, 'barangay_clearance_reason')->textarea()->label(false); ?> </td>
                 <?php echo "<td>" ;?><br><center><?= $form->field($modelVerify, 'barangay_clearance')->fileInput()->label(false) ?></center> </td>    
                       </tr>    
                       <tr>
                            <td>Zoning Clearance</td>
                            <td><br><?= $form->field($modelVerify, 'zoning_clearance_status')->radioList(array('Approved'=>'Approved', 'Pending'=>'Pending'))->label(false); ?></td>                            
                 <?php echo "<td>";?><?= $form->field($modelVerify, 'zoning_clearance_reason')->textarea()->label(false); ?> </td>
                 <?php echo "<td>" ;?><br><center><?= $form->field($modelVerify, 'zoning_clearance')->fileInput()->label(false) ?></center> </td>    
                       </tr>  
                       <tr>
                            <td>Sanitary Clearance</td>
                            <td><br><?= $form->field($modelVerify, 'sanitary_clearance_status')->radioList(array('Approved'=>'Approved', 'Pending'=>'Pending'))->label(false); ?></td>                            
                 <?php echo "<td>";?><?= $form->field($modelVerify, 'sanitary_clearance_reason')->textarea()->label(false); ?></td>
                 <?php echo "<td>" ;?><br><center><?= $form->field($modelVerify, 'sanitary_clearance')->fileInput()->label(false) ?></center> </td>    
                       </tr>  
                       <tr>
                            <td>Occupancy Permit</td>
                            <td><br><?= $form->field($modelVerify, 'occupancy_permit_status')->radioList(array('Approved'=>'Approved', 'Pending'=>'Pending'))->label(false); ?></td>                            
                 <?php echo "<td>";?><?= $form->field($modelVerify, 'occupancy_permit_reason')->textarea()->label(false); ?></td>
                 <?php echo "<td>" ;?><br><center><?= $form->field($modelVerify, 'occupancy_permit')->fileInput()->label(false) ?></center> </td>    
                       </tr>  
                       <tr>
                            <td>Fire Safety Inspection Certificate</td>   
                            <td><br><?= $form->field($modelVerify, 'fire_safety_status')->radioList(array('Approved'=>'Approved', 'Pending'=>'Pending'))->label(false); ?></td>                            
                 <?php echo "<td>";?><?= $form->field($modelVerify, 'fire_safety_reason')->textarea()->label(false); ?></td>
                 <?php echo "<td>" ;?><br><center><?= $form->field($modelVerify, 'fire_safety')->fileInput()->label(false) ?></center> </td>    
                       </tr>

                </table>      
    <br>
    <br>

        <?= $form->field($modelVerify, 'received_by')->textInput(['readonly' => true, 'value' => trim(Yii::$app->user->identity->full_name, " ")]) ?>

        <?php echo $form->field($modelVerify, 'date')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Enter approval date ...'],
            'pluginOptions' => [
                'autoclose'=>true
            ]
        ]); ?>
        

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>


</div>