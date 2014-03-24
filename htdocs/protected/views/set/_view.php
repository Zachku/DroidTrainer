<?php
/* @var $this SetController */
/* @var $data Set */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('set_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->set_id), array('view', 'id'=>$data->set_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('exercise_id')); ?>:</b>
	<?php echo CHtml::encode($data->exercise_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reps')); ?>:</b>
	<?php echo CHtml::encode($data->reps); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('weight')); ?>:</b>
	<?php echo CHtml::encode($data->weight); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('day_id')); ?>:</b>
	<?php echo CHtml::encode($data->day_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />


</div>