<?php
/* @var $this SetController */
/* @var $model Set */

$this->breadcrumbs = array(
    'Sets' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List Set', 'url' => array('index')),
    array('label' => 'Manage Set', 'url' => array('admin')),
);
?>

<h1>Create Set</h1>

<?php //$this->renderPartial('_form', array('model' => $model)); ?>

<div class="form">
    <?php echo CHtml::beginForm('create', 'post'); ?>
    
    <div class="row"> 
        <?php echo CHtml::activeLabel($model, 'exercise_id'); ?>
        <?php echo CHtml::activeDropDownList($model, 'exercise_id', $exercises, array('prompt' => 'Choose exercise:')); ?> 
    </div>
    <div class="row"> 
        <?php echo CHtml::activeLabel($model, 'reps'); ?>
        <?php echo CHtml::activeNumberField($model, 'reps'); ?> 
    </div>
    <div class="row"> 
        <?php echo CHtml::activeLabel($model, 'weight'); ?>
        <?php echo CHtml::activeNumberField($model, 'weight'); ?> 
    </div>
    <div class="row"> 
        <?php echo CHtml::activeLabel($model, 'day_id'); ?>
        <?php echo CHtml::activeDropDownList($model, 'day_id', $days, array('prompt' => 'Choose day:')); ?> 
    </div>
    <div class="row"> 
        <?php echo CHtml::activeLabel($model, 'user_id'); ?>
        <?php echo CHtml::activeDropDownList($model, 'user_id', $users, array('prompt' => 'Choose user:')); ?> 
    </div>
    <div class="row"> 
        <?php echo CHtml::submitButton('Submit'); ?> 
    </div>
    <?php echo CHtml::endForm(); ?>
</div>