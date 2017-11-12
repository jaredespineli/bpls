<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Assessment */

$this->title = $model->business_name;
$this->params['breadcrumbs'][] = ['label' => 'Assessments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assessment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->assessment_id], ['class' => 'btn btn-primary']) ?>               
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'assessment_id',
            'capital_amount',
            'gross_sales_tax_amt',
            'gross_sales_tax_pnl',
            'transport_truck_tax_amt',
            'transport_truck_tax_pnl',
            'hazard_storage_tax_amt',
            'hazard_storage_tax_pnl',
            'sign_billboard_tax_amt',
            'sign_billboard_tax_pnl',
            'mayors_permit_fee_amt',
            'mayors_permit_fee_pnl',
            'garbage_fee_amt',
            'garbage_fee_pnl',
            'truck_van_permit_fee_amt',
            'truck_van_permit_fee_pnl',
            'sanitary_permit_fee_amt',
            'sanitary_permit_fee_pnl',
            'bldg_insp_fee_amt',
            'bldg_insp_fee_pnl',
            'elec_insp_fee_amt',
            'elec_insp_fee_pnl',
            'mech_insp_fee_amt',
            'mech_insp_fee_pnl',
            'plumb_insp_fee_amt',
            'plumb_insp_fee_pnl',
            'sign_billboard_fee_amt',
            'sign_billboard_fee_pnl',
            'sign_billboard_renew_fee_amt',
            'sign_billboard_renew_fee_pnl',
            'hazard_storage_fee_amt',
            'hazard_storage_fee_pnl',
            'bfp_fee_amt',
            'bfp_fee_pnl',
            //'assessment_date',
            'assessment_date_month',
            'assessment_date_day',
            'assessment_date_year',
            'grand_total',
        ],
    ]) ?>

</div>
