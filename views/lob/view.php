<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Lob */

$this->title = $model->major_code;
$this->params['breadcrumbs'][] = ['label' => 'Lobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lob-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->major_code], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->major_code], [
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
            'major_code',
            'code',
            'description',
        ],
    ]) ?>

</div>
