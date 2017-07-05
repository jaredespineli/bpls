<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BusAcctDetail */

$this->title = 'Create Bus Acct Detail';
$this->params['breadcrumbs'][] = ['label' => 'Bus Acct Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bus-acct-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
