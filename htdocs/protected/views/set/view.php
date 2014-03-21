<?php
/* @var $this SetController */
/* @var $model Set */

$this->breadcrumbs=array(
	'Sets'=>array('index'),
	$model->set_id,
);

$this->menu=array(
	array('label'=>'List Set', 'url'=>array('index')),
	array('label'=>'Create Set', 'url'=>array('create')),
	array('label'=>'Update Set', 'url'=>array('update', 'id'=>$model->set_id)),
	array('label'=>'Delete Set', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->set_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Set', 'url'=>array('admin')),
);
?>

<h1>View Set #<?php echo $model->set_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'set_id',
		'exercise_id',
		'reps',
		'wight',
		'day_id',
	),
)); ?>
