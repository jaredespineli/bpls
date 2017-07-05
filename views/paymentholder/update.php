<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PaymentHolder */

$this->title = 'Update Payment Holder: ' . $model->payment_holder_id;
$this->params['breadcrumbs'][] = ['label' => 'Payment Holders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->payment_holder_id, 'url' => ['view', 'id' => $model->payment_holder_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="payment-holder-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
