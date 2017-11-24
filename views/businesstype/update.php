<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Businesstype */

$this->title = 'Update Businesstype: ' . $model->businesstype_id;
$this->params['breadcrumbs'][] = ['label' => 'Businesstypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->businesstype_id, 'url' => ['view', 'id' => $model->businesstype_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="businesstype-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
