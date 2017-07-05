<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Lob */

$this->title = 'Update Lob: ' . $model->major_code;
$this->params['breadcrumbs'][] = ['label' => 'Lobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->major_code, 'url' => ['view', 'id' => $model->major_code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lob-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
