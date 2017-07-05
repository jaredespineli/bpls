<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PayMode */

$this->title = 'Update Pay Mode: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Pay Modes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->pay_mode_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pay-mode-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
