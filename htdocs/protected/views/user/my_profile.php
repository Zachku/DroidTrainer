<h1>My profile</h1>
<h2>Edit your profile <?php echo Yii::app()->user->name; ?></h2>
<div id="daylist">
    <h2>Your training days</h2>
    <ul class ="days">
    <?php
    foreach ($days as $day) { ?>
        <li>
        <?php echo CHtml::link($day->date, array('/day/view', 'id' => $day->day_id)), ' ',
        CHtml::link("Delete", '#', array(
        'submit'=>array('day/delete', "id"=>$day->day_id), 
        'confirm' => 'Are you sure you want to delete?')); ?>
        </li>
    <?php }
    ?>
    </ul>
    <h2>Start a new training day <?php echo CHtml::link('here', array('/day/create_new')); ?> </h2>
</div>

