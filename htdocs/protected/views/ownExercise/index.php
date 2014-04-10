<?php
/* @var $this OwnExerciseController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Own Exercises',
);

$this->menu=array(
	array('label'=>'Create OwnExercise', 'url'=>array('create')),
	array('label'=>'Manage OwnExercise', 'url'=>array('admin')),
);
?>

<h1>Own Exercises</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
