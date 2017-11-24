<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Business */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="updateinfo-form">
	<?php $form = ActiveForm::begin(); ?>	    

	    <?= $form->field($model, 'mayor_name')->textInput(['maxlength' => true]) ?>	    	    
		
		<div class="form-group" >
	        <?= Html::submitButton('Update', ['class' => 'btn btn-primary']) ?>
	    </div>

    <?php ActiveForm::end(); ?>    

</div>