<?php
/* @var $this DayController */
/* @var $model Day */
/*
  $this->breadcrumbs = array(
  'Days' => array('index'),
  $model->day_id,
  );


  $this->menu = array(
  array('label' => 'List Day', 'url' => array('index')),
  array('label' => 'Create Day', 'url' => array('create')),
  array('label' => 'Update Day', 'url' => array('update', 'id' => $model->day_id)),
  array('label' => 'Delete Day', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->day_id), 'confirm' => 'Are you sure you want to delete this item?')),
  array('label' => 'Manage Day', 'url' => array('admin')),
  );
 * */
?>

<h1><b class="username"><?php echo $username->name; ?>'s</b> training day  <?php echo $model->date; ?></h1>

<?php
/*
  $this->widget('zii.widgets.CDetailView', array(
  'data' => $model,
  'attributes' => array(
  'username',
  'date',
  ),
  ));
 */
?>


<div id="addSetForm">
    <h2>Add a new set for this day</h2>
    <div class="form">
        <?php echo CHtml::beginForm(array('set/create'), 'post'); ?>

        <div class="row"> 
            <?php echo CHtml::activeLabel($set_model, 'exercise_id'); ?>
            <?php echo CHtml::activeDropDownList($set_model, 'exercise_id', $exercises, array('prompt' => 'Choose exercise:')); ?> 
            <p>If there is no exercise you need, you can add more <?php echo CHtml::link('here', array('exercise/index')); ?></p>
        </div>
        <div class="row"> 
            <?php echo CHtml::activeLabel($set_model, 'reps'); ?>
            <?php echo CHtml::activeNumberField($set_model, 'reps', array('value' => '0')); ?> 
        </div>
        <div class="row"> 
            <?php echo CHtml::activeLabel($set_model, 'weight'); ?>
            <?php echo CHtml::activeNumberField($set_model, 'weight', array('value' => '0')); ?> 
        </div>
        <div class="row"> 
            <?php echo CHtml::activeLabel($set_model, 'day_id'); ?>
            <?php echo CHtml::activeHiddenField($set_model, 'day_id', array('value' => $model->day_id, 'readonly' => true, 'visibility' => 'false')); ?> 
        </div>
        <div class="row"> 
            <?php echo CHtml::submitButton('Submit'); ?> 
        </div>
        <?php echo CHtml::endForm(); ?>
    </div>
</div>


<div id="listOfExercises">
    <h2>Exercises of day <?php echo $model->date; ?> </h2>
    <table>
        <tr>
            <th>Exercise</th>
            <th>Reps</th>
            <th>Weight</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($sets as $set) { ?>
            <tr>
                <td><b><?php echo $set->exercise->name; ?> </b> </td>
                <td>Reps : <?php echo $set->reps ?> </td>
                <td>Weight: <?php echo $set->weight; ?></td>
                <td><?php
                    echo CHtml::link("Delete", '#', array(
                        'submit' => array('set/delete', "id" => $set->set_id, "returnUrl" => '../day/index' + $set->day_id),
                        'confirm' => 'Are you sure you want to delete?'));
                    ?></td> 
            </tr>
        <?php } ?>
    </table>
</div>
