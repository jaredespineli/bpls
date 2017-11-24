<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Business */

$this->title = $model->business_id;
$this->params['breadcrumbs'][] = ['label' => 'Businesses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="business-view">

    <h1>Business ID: <?= Html::encode($this->title) ?> | <?php echo $model->business_name?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->business_id], ['class' => 'btn btn-primary']) ?>                   
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'user_id',
            'business_name',
            'trade_name',
            'president_name',
            'org_type',
            'ein',
            'tin',
            'lob_code',
            'lob_desc',
            'capital_amount',
            'tel_num',
            'website_url:url',
            'bldg_num',
            'bldg_name',
            'unit_num',
            'street',
            'subdivision',
            'barangay',
            'property_index_num',
            'has_lessor',
            'lessor_business_id',
            'business_area',
            'employee_count',
            'sss_ref',
            'sec_ref',
            'dti_ref',
            'cda_ref',
            'fsic_ref',
            'application_barcode',
            'barangay_barcode',
            'zoning_barcode',
            'sanitary_barcode',
            'occupancy_barcode',
            'others_one_barcode',
            'others_two_barcode',
            'others_three_barcode',
            'others_four_barcode',
            'tax_payment_type',
            //'sys_entry_date',
            //'status',
            'full_address',
            'pay_mode',
            'postal_code',
            'business_id',
            'sys_entry_date',
        ],
    ]) ?>

</div>
