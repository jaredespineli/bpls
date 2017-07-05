<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IssuanceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Issuances';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="issuance-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Issuance', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'issuance_id',
            'approval_id',
            'business_reg_num',
            'full_business_name',
            'or_reference',
            // 'or_reference_date',
            // 'released_to',
            // 'scheduled_release_date',
            // 'actual_release_date',
            // 'issuance_barcode_ref',
            // 'issued_by_name',
            // 'issuance_by_id',
            // 'sys_entry_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
