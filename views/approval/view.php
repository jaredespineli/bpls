<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Approval */

$this->title = $model->approval_id;
$this->params['breadcrumbs'][] = ['label' => 'Approvals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="approval-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->approval_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->approval_id], [
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
            'approval_id',
            'sic_code',
            'property_index_code',
            'postal_code',
            'full_business_name',
            'remarks',
            'approval_status',
            'business_reg_num',
            'action_date',
            'approval_date',
            'issue_date',
            'next_renewal_date',
            'sys_entry_date',
            'account_holder_id',
        ],
    ]) ?>

</div>
