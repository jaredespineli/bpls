<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ApprovalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Approvals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="approval-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Approval', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'approval_id',
            'sic_code',
            'property_index_code',
            'postal_code',
            'full_business_name',
            // 'remarks',
            // 'approval_status',
            // 'business_reg_num',
            // 'action_date',
            // 'approval_date',
            // 'issue_date',
            // 'next_renewal_date',
            // 'sys_entry_date',
            // 'account_holder_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
