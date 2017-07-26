<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Assessment */

$this->title = 'Update Assessment: ' . $model->business_name;
$this->params['breadcrumbs'][] = ['label' => 'Assessments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->assessment_id, 'url' => ['view', 'id' => $model->assessment_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="assessment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
