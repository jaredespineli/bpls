<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use app\models\Business;
/* @var $this yii\web\View */
/* @var $searchModel app\models\Business */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Zoning Clearance';
// $this->params['breadcrumbs'][] = ['label' => 'Business', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => 'Business', 'url' => ['verifydoc', 'id' => $model->business]]; 
$this->params['breadcrumbs'][] = $this->title;

$modelBusiness =  Business::find()
                ->where(['business_id' => $model->business_id])
                ->one();
?>

<div class="view-zoning-clerance">
    <h3><?php echo $modelBusiness->business_name?> : Zoning Clearance</h3>

    <img src="<?php echo Yii::getAlias('@web').'/zoningclearance_uploads/'. trim($model->zoning_clearance, " "); ?>" height="500px" width="500px">

</div>
