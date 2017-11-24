<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use app\models\Business;
/* @var $this yii\web\View */
/* @var $searchModel app\models\Business */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Barangay Clearance';
// $this->params['breadcrumbs'][] = ['label' => 'Business', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => 'Business', 'url' => ['verifydoc', 'id' => $modelBusiness->business_id]]; 
$this->params['breadcrumbs'][] = $this->title;

$modelBusiness =  Business::find()
                ->where(['business_id' => $model->business_id])
                ->one();
?>

<div class="view-barangay-clearance">
    <h3><?php echo $modelBusiness->business_name?> : Barangay Clearance</h3>

    <img src="<?php echo Yii::getAlias('@web').'/barangayclearance_uploads/'. trim($model->barangay_clearance, " "); ?>" height="500px" width="500px">

</div>
