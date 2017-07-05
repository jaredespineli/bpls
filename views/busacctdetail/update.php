<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BusAcctDetail */

$this->title = 'Update Bus Acct Detail: ' . $model->account_detail_id;
$this->params['breadcrumbs'][] = ['label' => 'Bus Acct Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->account_detail_id, 'url' => ['view', 'id' => $model->account_detail_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bus-acct-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
