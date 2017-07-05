<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Lob */

$this->title = 'Create Lob';
$this->params['breadcrumbs'][] = ['label' => 'Lobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lob-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
