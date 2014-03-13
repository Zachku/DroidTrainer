<?php
/* @var $this SetController */
/* @var $model Set */

$this->breadcrumbs=array(
	'Sets'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Set', 'url'=>array('index')),
	array('label'=>'Manage Set', 'url'=>array('admin')),
);
?>

<h1>Create Set</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>