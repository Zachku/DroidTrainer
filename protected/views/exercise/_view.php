<?php
/* @var $this ExerciseController */
/* @var $data Exercise */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('exercise_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->exercise_id), array('view', 'id'=>$data->exercise_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('instruction')); ?>:</b>
	<?php echo CHtml::encode($data->instruction); ?>
	<br />


</div>