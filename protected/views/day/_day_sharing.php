<div id ="day_sharing">
<?php if(!$model->is_public) {?>
    <p> This day is private. Share this day <?php echo CHtml::ajaxLink('here', array('day/set_public', 'id' => $model->day_id), array('update' => '#day_sharing')); ?>
<?php } else { ?>
    <p> This day is public. Set this day private <?php echo CHtml::ajaxLink('here', array('day/set_public', 'id' => $model->day_id)); ?>
<?php }?>
</div>