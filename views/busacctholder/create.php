<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BusAcctHolder */

$this->title = 'Create Bus Acct Holder';
$this->params['breadcrumbs'][] = ['label' => 'Bus Acct Holders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bus-acct-holder-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
