<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TaxDeclarationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Official Receipt';
$this->params['breadcrumbs'][] = ['label' => 'Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Payment', 'url' => ['paytable', 'id' => $model->payment_id]]; //paytable
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="view-official-receipt">
    <h3>Official Receipt: <?php echo $model->or_number; ?></h3>

    <img src="<?php echo Yii::getAlias('@web').'/officialreceipt_uploads/'. trim($model->officialreceipt, " "); ?>" height="500px" width="500px">

</div>
