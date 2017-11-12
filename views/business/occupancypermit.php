<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use app\models\Business;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TaxDeclarationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Occupancy Permit';
// $this->params['breadcrumbs'][] = ['label' => 'Business', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => 'Business', 'url' => ['verifydoc', 'id' => $model->business]]; 
$this->params['breadcrumbs'][] = $this->title;

$modelBusiness =  Business::find()
                ->where(['business_id' => $model->business_id])
                ->one();
?>

<div class="view-occupancy-permit">
    <h3><?php echo $modelBusiness->business_name?> : Occupancy Permit</h3>

    <img src="<?php echo Yii::getAlias('@web').'/occupancypermit_uploads/'. trim($model->occupancy_permit, " "); ?>" height="500px" width="500px">

</div>
