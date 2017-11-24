<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BusinesstypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Businesstypes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="businesstype-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Businesstype', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'businesstype_id',
            'org_type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
