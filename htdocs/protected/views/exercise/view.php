<?php
/* @var $this ExerciseController */
/* @var $model Exercise */

$this->breadcrumbs = array(
    'Exercises' => array('index'),
    $model->name,
);
/*
if (!Yii::app()->user->isGuest) {
    $this->menu = array(
        array('label' => 'List Exercise', 'url' => array('index')),
        array('label' => 'Create Exercise', 'url' => array('create')),
        array('label' => 'Update Exercise', 'url' => array('update', 'id' => $model->exercise_id)),
        array('label' => 'Delete Exercise', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->exercise_id), 'confirm' => 'Are you sure you want to delete this item?')),
        array('label' => 'Manage Exercise', 'url' => array('admin')),
    );
}
 * 
 */
?>

<h1>View Exercise #<?php echo $model->exercise_id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'exercise_id',
        'name',
        'instruction',
    ),
));
?>
