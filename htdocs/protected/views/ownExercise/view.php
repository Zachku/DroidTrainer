<?php
/* @var $this OwnExerciseController */
/* @var $model OwnExercise */

$this->breadcrumbs=array(
	'Own Exercises'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List OwnExercise', 'url'=>array('index')),
	array('label'=>'Create OwnExercise', 'url'=>array('create')),
	array('label'=>'Update OwnExercise', 'url'=>array('update', 'id'=>$model->own_exercise_id)),
	array('label'=>'Delete OwnExercise', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->own_exercise_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OwnExercise', 'url'=>array('admin')),
);
?>

<h1>View OwnExercise #<?php echo $model->own_exercise_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'own_exercise_id',
		'user_id',
		'name',
		'instruction',
	),
)); ?>
