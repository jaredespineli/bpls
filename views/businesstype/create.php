<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Businesstype */

$this->title = 'Create Businesstype';
$this->params['breadcrumbs'][] = ['label' => 'Businesstypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="businesstype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
