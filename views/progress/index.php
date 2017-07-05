<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProgressSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Progresses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="progress-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Progress', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'progress_id',
            'business_information',
            'documents',
            'assessment',
            'payment',
            // 'approval',
            // 'account_holder_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
