<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PaymentHolderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payment Holders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-holder-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Payment Holder', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'payment_holder_id',
            'account_holder_id',
            'business_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
