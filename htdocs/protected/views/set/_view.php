<?php
/* @var $this SetController */
/* @var $data Set */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('exercise_id')); ?>:</b>
	<?php echo CHtml::encode($data->exercise_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reps')); ?>:</b>
	<?php echo CHtml::encode($data->reps); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wight')); ?>:</b>
	<?php echo CHtml::encode($data->wight); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('day_id')); ?>:</b>
	<?php echo CHtml::encode($data->day_id); ?>
	<br />


</div>