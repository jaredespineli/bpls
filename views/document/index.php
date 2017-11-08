<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DocumentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Documents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Document', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'document_id',
            'document_status',
            'business_id',
            'received_by',
            'date',
            // 'barangay_clearance_status',
            // 'zoning_clearance_status',
            // 'sanitary_clearance_status',
            // 'occupancy_permit_status',
            // 'fire_safety_status',
            // 'barangay_clearance_reason',
            // 'zoning_clearance_reason',
            // 'sanitary_clearance_reason',
            // 'occupancy_permit_reason',
            // 'fire_safety_reason',
            // 'barangay_clearance_received_by',
            // 'zoning_clearance_received_by',
            // 'sanitary_clearance_received_by',
            // 'occupancy_permit_received_by',
            // 'fire_safety_received_by',
            // 'barangay_clearance_date',
            // 'zoning_clearance_date',
            // 'sanitary_clearance_date',
            // 'occupancy_permit_date',
            // 'fire_safety_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
