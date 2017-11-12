<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use app\models\Business;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TaxDeclarationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fire Safety Inspection Certificate';
// $this->params['breadcrumbs'][] = ['label' => 'Business', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => 'Business', 'url' => ['verifydoc', 'id' => $model->business]]; 
$this->params['breadcrumbs'][] = $this->title;

$modelBusiness =  Business::find()
                ->where(['business_id' => $model->business_id])
                ->one();
?>

<div class="view-fire-safety">
    <h3><?php echo $modelBusiness->business_name?> : Fire Safety Inspection Certificate</h3>

    <img src="<?php echo Yii::getAlias('@web').'/firesafety_uploads/'. trim($model->fire_safety, " "); ?>" height="500px" width="500px">

</div>
