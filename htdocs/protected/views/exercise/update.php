<?php
/* @var $this ExerciseController */
/* @var $model Exercise */

$this->breadcrumbs=array(
	'Exercises'=>array('index'),
	$model->name=>array('view','id'=>$model->exercise_id),
	'Update',
);
/*
$this->menu=array(
	array('label'=>'List Exercise', 'url'=>array('index')),
	array('label'=>'Create Exercise', 'url'=>array('create')),
	array('label'=>'View Exercise', 'url'=>array('view', 'id'=>$model->exercise_id)),
	array('label'=>'Manage Exercise', 'url'=>array('admin')),
);
 * 
 */
?>

<h1>Update Exercise <?php echo $model->exercise_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>