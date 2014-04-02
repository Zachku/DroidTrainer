<?php
/* @var $this SetController */
/* @var $model Set */

$this->breadcrumbs=array(
	'Sets'=>array('index'),
	$model->set_id=>array('view','id'=>$model->set_id),
	'Update',
);
/*
$this->menu=array(
	array('label'=>'List Set', 'url'=>array('index')),
	array('label'=>'Create Set', 'url'=>array('create')),
	array('label'=>'View Set', 'url'=>array('view', 'id'=>$model->set_id)),
	array('label'=>'Manage Set', 'url'=>array('admin')),
);
 * 
 */
?>

<h1>Update Set <?php echo $model->set_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>