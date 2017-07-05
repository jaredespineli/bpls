<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BusAcctHolder */

$this->title = $model->account_holder_id;
$this->params['breadcrumbs'][] = ['label' => 'Bus Acct Holders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bus-acct-holder-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->account_holder_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->account_holder_id], [
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
            'account_holder_id',
            'business_id',
            'user_id',
            'application_date',
        ],
    ]) ?>

</div>
