<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RenewalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Renewals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="renewal-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model){
            $url = Url::to(['renewal/renewalstatus', 'id' => $model["business_id"]]);
            return ['onclick' => "window.location.href='{$url}'"];
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'renewal_id',            
            //'business_id',
            'business_name',
            'renewal_status',            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
