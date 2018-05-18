<?php

use	yii\helpers\Html;
use	yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UserGroup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-group-form">

		<?php	$form	=	ActiveForm::begin();	?>
		<div class="form-group col-md-6">
				<?=	$form->field($model,	'group_name')->textInput(['maxlength'	=>	true])	?>
		</div>

		<div class="form-group col-md-6">
				<?=	$form->field($model,	'institute_id')->textInput()	?>
		</div>
		<div class="form-group">
				<?=	Html::submitButton($model->isNewRecord	?	Yii::t('app',	'Create')	:	Yii::t('app',	'Update'),	['class'	=>	$model->isNewRecord	?	'btn btn-success'	:	'btn btn-primary'])	?>
		</div>

		<?php	ActiveForm::end();	?>

</div>
