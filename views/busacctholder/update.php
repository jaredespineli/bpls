<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BusAcctHolder */

$this->title = 'Update Bus Acct Holder: ' . $model->account_holder_id;
$this->params['breadcrumbs'][] = ['label' => 'Bus Acct Holders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->account_holder_id, 'url' => ['view', 'id' => $model->account_holder_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bus-acct-holder-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
