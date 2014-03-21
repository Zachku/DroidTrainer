<?php
/* @var $this DayController */
/* @var $data Day */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('day_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->day_id), array('view', 'id'=>$data->day_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />


</div>