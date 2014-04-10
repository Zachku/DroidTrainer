<?php
/* @var $this ExerciseController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Exercises',
);
if (!Yii::app()->user->isGuest) {
    /*
      $this->menu = array(
      array('label' => 'Create Exercise', 'url' => array('create')),
      array('label' => 'Manage Exercise', 'url' => array('admin')),
      );
     * 
     */
}
?>

<h1>Exercises</h1>
<h2>Your own exercises</h2>

<table>
    <tr><th>Exercise name</th><th>Instruction</th><th>Delete</th></tr>
    <?php foreach ($user_exercises as $ex) { ?>
        <tr><td><?php echo $ex->name; ?> </td><td><?php echo $ex->instruction; ?></td><td><?php
                echo CHtml::link(
                        'Delete', '', array(
                    'submit' => array('exercise/deleteMy'),
                    'params' => array('id' => $ex->exercise_id))
                );
                ?></td></tr>
    <?php } ?>
</table>
<div id='addExercise'>
    <h3>Add new exercise</h3>
    <?php
    if (!empty($error)) {
        echo '$error';
    }
    ?>
    <div class="form">

        <?php echo CHtml::beginForm(array('exercise/createMy'), 'post'); ?>

        <div class="row"> 
            <?php echo CHtml::label('Name', false); ?>
            <?php echo CHtml::textField('name'); ?>
        </div>
        <div class="row"> 
            <?php echo CHtml::label('Instruction', false); ?>
            <?php echo CHtml::textArea('instruction'); ?>
        </div>
        <div class="row"> 
            <?php echo CHtml::submitButton('Submit'); ?> 
        </div>
        <?php echo CHtml::endForm(); ?>
    </div>
</div>
<h2>Server exercises</h2>
<table>
    <tr><th>Exercise name</th><th>Instruction</th></tr>
    <?php foreach ($server_exercises as $ex) { ?>
        <tr><td><?php echo $ex->name; ?> </td><td><?php echo $ex->instruction; ?></td></tr>
    <?php } ?>
</table>