<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BusAcctDetail */

$this->title = $model->account_detail_id;
$this->params['breadcrumbs'][] = ['label' => 'Bus Acct Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bus-acct-detail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->account_detail_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->account_detail_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'account_detail_id',
            'account_holder_id',
            'pay_mode',
            'capital_amount',
            'gross_sales_tax',
            'gross_sales_tax_amt',
            'gross_sales_tax_pnl',
            'transport_truck_tax',
            'transport_truck_tax_amt',
            'transport_truck_tax_pnl',
            'sign_billboard_tax',
            'sign_billboard_tax_amt',
            'sign_billboard_tax_pnl',
            'mayors_permit_fee',
            'mayors_permit_fee_amt',
            'mayors_permit_fee_pnl',
            'garbage_fee',
            'garbage_fee_amt',
            'garbage_fee_pnl',
            'truck_van_permit_fee',
            'truck_van_permit_fee_amt',
            'truck_van_permit_fee_pnl',
            'sanitary_permit_fee',
            'sanitary_permit_fee_amt',
            'sanitary_permit_fee_pnl',
            'bldg_insp_fee',
            'bldg_insp_fee_pnl',
            'bldg_insp_fee_amt',
            'elec_insp_fee',
            'elec_insp_fee_amt',
            'elec_insp_fee_pnl',
            'mech_insp_fee',
            'mech_insp_fee_amt',
            'mech_insp_fee_pnl',
            'plumb_insp_fee',
            'plumb_insp_fee_amt',
            'plumb_insp_fee_pnl',
            'sign_billboard_fee',
            'sign_billboard_fee_amt',
            'sign_billboard_fee_pnl',
            'sign_billboard_renew_fee',
            'sign_billboard_renew_fee_amt',
            'sign_billboard_renew_fee_pnl',
            'hazard_storage_fee',
            'hazard_storage_fee_amt',
            'hazard_storage_fee_pnl',
            'bfp_fee',
            'bfp_fee_amt',
            'bfp_fee_pnl',
            'grand_total',
            'sys_entry_date',
            'hazard_storage_tax',
            'hazard_storage_tax_amt',
            'hazard_storage_tax_pnl',
        ],
    ]) ?>

</div>
