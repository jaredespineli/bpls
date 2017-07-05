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
            'barangay_clearance',
            'barangay_status',
            'zoning_clearance',
            'zoning_status',
            // 'sanitary_clearance',
            // 'sanitary_status',
            // 'occupancy_permit',
            // 'occupancy_status',
            // 'fire_safety',
            // 'fire_safety_status',
            // 'file_path',
            // 'sys_entry_date',
            // 'account_holder_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
