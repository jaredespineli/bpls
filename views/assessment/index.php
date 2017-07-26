<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AssessmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Assessments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assessment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!-- <p>
        <?= Html::a('Create Assessment', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'rowOptions' => function($model){
            $url = Url::to(['assessment/update', 'id' => $model["assessment_id"]]);
            return ['onclick' => "window.location.href='{$url}'"];
        },

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'business_name',

            // 'assessment_id',
            // 'capital_amount',
            // 'gross_sales_tax_amt',
            // 'gross_sales_tax_pnl',
            // 'transport_truck_tax_amt',
            // 'transport_truck_tax_pnl',
            // 'hazard_storage_tax_amt',
            // 'hazard_storage_tax_pnl',
            // 'sign_billboard_tax_amt',
            // 'sign_billboard_tax_pnl',
            // 'mayors_permit_fee_amt',
            // 'mayors_permit_fee_pnl',
            // 'garbage_fee_amt',
            // 'garbage_fee_pnl',
            // 'truck_van_permit_fee_amt',
            // 'truck_van_permit_fee_pnl',
            // 'sanitary_permit_fee_amt',
            // 'sanitary_permit_fee_pnl',
            // 'bldg_insp_fee_amt',
            // 'bldg_insp_fee_pnl',
            // 'elec_insp_fee_amt',
            // 'elec_insp_fee_pnl',
            // 'mech_insp_fee_amt',
            // 'mech_insp_fee_pnl',
            // 'plumb_insp_fee_amt',
            // 'plumb_insp_fee_pnl',
            // 'sign_billboard_fee_amt',
            // 'sign_billboard_fee_pnl',
            // 'sign_billboard_renew_fee_amt',
            // 'sign_billboard_renew_fee_pnl',
            // 'hazard_storage_fee_amt',
            // 'hazard_storage_fee_pnl',
            // 'bfp_fee_amt',
            // 'bfp_fee_pnl',
            // 'assessment_date',
            // 'assessment_date_month',
            // 'assessment_date_day',
            // 'assessment_date_year',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
