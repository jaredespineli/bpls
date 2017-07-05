<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Issuance */

$this->title = $model->issuance_id;
$this->params['breadcrumbs'][] = ['label' => 'Issuances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="issuance-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->issuance_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->issuance_id], [
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
            'issuance_id',
            'approval_id',
            'business_reg_num',
            'full_business_name',
            'or_reference',
            'or_reference_date',
            'released_to',
            'scheduled_release_date',
            'actual_release_date',
            'issuance_barcode_ref',
            'issued_by_name',
            'issuance_by_id',
            'sys_entry_date',
        ],
    ]) ?>

</div>
