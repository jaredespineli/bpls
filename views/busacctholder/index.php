<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BusAcctHolderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bus Acct Holders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bus-acct-holder-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bus Acct Holder', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'account_holder_id',
            'business_id',
            'user_id',
            'application_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
