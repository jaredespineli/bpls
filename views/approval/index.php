<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BusinessSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Approval';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="approval-index">
	<h1><?= Html::encode($this->title) ?></h1>
	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'rowOptions' => function($model){
            $url = Url::to(['approval/status', 'id' => $model["approval_id"]]);
            return ['onclick' => "window.location.href='{$url}'"];
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'business_name',
            'approval_status',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>