<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Renewal */

$this->title = $model->renewal_id;
$this->params['breadcrumbs'][] = ['label' => 'Renewals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="renewal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->renewal_id], ['class' => 'btn btn-primary']) ?>        
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'renewal_id',
            'renewal_status',
            'business_id',
            'business_name',
        ],
    ]) ?>

</div>
