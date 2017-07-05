<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PayMode */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Pay Modes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pay-mode-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->pay_mode_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->pay_mode_id], [
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
            'pay_mode_id',
            'due_date',
            'or_num',
            'name',
            'amount_due',
            'payment_holder_id',
            'amount_id',
        ],
    ]) ?>

</div>
