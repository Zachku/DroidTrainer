<?php
/* @var $this DayController */
/* @var $model Day */

$this->breadcrumbs=array(
	'Days'=>array('index'),
	$model->day_id=>array('view','id'=>$model->day_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Day', 'url'=>array('index')),
	array('label'=>'Create Day', 'url'=>array('create')),
	array('label'=>'View Day', 'url'=>array('view', 'id'=>$model->day_id)),
	array('label'=>'Manage Day', 'url'=>array('admin')),
);
?>

<h1>Update Day <?php echo $model->day_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>