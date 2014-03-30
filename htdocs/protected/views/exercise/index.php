<?php
/* @var $this ExerciseController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Exercises',
);
if (!Yii::app()->user->isGuest) {
    $this->menu = array(
        array('label' => 'Create Exercise', 'url' => array('create')),
        array('label' => 'Manage Exercise', 'url' => array('admin')),
    );
}
?>

<h1>Exercises</h1>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
