<?php

use yii/helpers/Html;
use yii/grid/GridView;
use yii/helpers/Url;
use yii/widgets/ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Payment */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Payment Options';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="payment-options-bi-annually">

	<h3><?= Html::encode($this->title)?></h3>

	<br>

	<?= $form = ActiveForm::begin(); ?>

	<?= $form->field($modelPayment, 'payment_bi_annually')->radioList(
		array(1 => 'First Half', 2 => 'Second Half')
		); ?>

	<?= Html::submitButton('Save', ['class' =>'btn btn-success']) ?>

	<?php ActiveForm::end(); ?>	

</div>