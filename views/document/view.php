<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Document */

$this->title = $model->document_id;
$this->params['breadcrumbs'][] = ['label' => 'Documents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->document_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->document_id], [
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
            'document_id',
            'document_status',
            'business_id',
            'received_by',
            'date',
            'barangay_clearance_status',
            'zoning_clearance_status',
            'sanitary_clearance_status',
            'occupancy_permit_status',
            'fire_safety_status',
            'barangay_clearance_reason',
            'zoning_clearance_reason',
            'sanitary_clearance_reason',
            'occupancy_permit_reason',
            'fire_safety_reason',
            'barangay_clearance_received_by',
            'zoning_clearance_received_by',
            'sanitary_clearance_received_by',
            'occupancy_permit_received_by',
            'fire_safety_received_by',
            'barangay_clearance_date',
            'zoning_clearance_date',
            'sanitary_clearance_date',
            'occupancy_permit_date',
            'fire_safety_date',
        ],
    ]) ?>

</div>
