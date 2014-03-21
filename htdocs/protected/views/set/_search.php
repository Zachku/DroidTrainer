<?php
/* @var $this SetController */
/* @var $model Set */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'set_id'); ?>
		<?php echo $form->textField($model,'set_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'exercise_id'); ?>
		<?php echo $form->textField($model,'exercise_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reps'); ?>
		<?php echo $form->textField($model,'reps'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wight'); ?>
		<?php echo $form->textField($model,'wight'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'day_id'); ?>
		<?php echo $form->textField($model,'day_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->