<?php
/* @var $this OwnExerciseController */
/* @var $model OwnExercise */

$this->breadcrumbs=array(
	'Own Exercises'=>array('index'),
	$model->name=>array('view','id'=>$model->own_exercise_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List OwnExercise', 'url'=>array('index')),
	array('label'=>'Create OwnExercise', 'url'=>array('create')),
	array('label'=>'View OwnExercise', 'url'=>array('view', 'id'=>$model->own_exercise_id)),
	array('label'=>'Manage OwnExercise', 'url'=>array('admin')),
);
?>

<h1>Update OwnExercise <?php echo $model->own_exercise_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>