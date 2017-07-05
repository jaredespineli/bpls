<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PayModeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pay Modes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pay-mode-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pay Mode', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pay_mode_id',
            'due_date',
            'or_num',
            'name',
            'amount_due',
            // 'payment_holder_id',
            // 'amount_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
