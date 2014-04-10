<?php
/* @var $this OwnExerciseController */
/* @var $model OwnExercise */

$this->breadcrumbs=array(
	'Own Exercises'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OwnExercise', 'url'=>array('index')),
	array('label'=>'Manage OwnExercise', 'url'=>array('admin')),
);
?>

<h1>Create OwnExercise</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>