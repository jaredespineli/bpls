<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BusinessSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Businesses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="business-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Business', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model){
            $url = Url::to(['business/update', 'id' => $model["business_id"]]);
            return ['onclick' => "window.location.href='{$url}'"];
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'user_id',
            'business_name',
            'trade_name',
            'president_name',
            'org_type',
            // 'ein',
            // 'tin',
            // 'lob_code',
            // 'lob_desc',
            // 'capital_amount',
            // 'tel_num',
            // 'website_url:url',
            // 'bldg_num',
            // 'bldg_name',
            // 'unit_num',
            // 'street',
            // 'subdivision',
            // 'barangay',
            // 'property_index_num',
            // 'has_lessor',
            // 'lessor_business_id',
            // 'business_area',
            // 'employee_count',
            // 'sss_ref',
            // 'sec_ref',
            // 'dti_ref',
            // 'cda_ref',
            // 'fsic_ref',
            // 'application_barcode',
            // 'barangay_barcode',
            // 'zoning_barcode',
            // 'sanitary_barcode',
            // 'occupancy_barcode',
            // 'others_one_barcode',
            // 'others_two_barcode',
            // 'others_three_barcode',
            // 'others_four_barcode',
            // 'tax_payment_type',
            // 'sys_entry_date',
            // 'status',
            // 'full_address',
            // 'pay_mode',
            // 'postal_code',
            // 'business_id',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
