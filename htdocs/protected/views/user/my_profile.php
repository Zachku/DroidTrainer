<h1>My profile</h1>
<h2>Edit your profile <?php echo Yii::app()->user->name ?></h2>
<h2>Edit your profile <?php echo Yii::app()->user->id ?></h2>
<div id="daylist">
    <h2>Your training days</h2>
    <?php
    foreach ($days as $day) {
        echo CHtml::link($day->date, array('/day/view', 'id' => $day->day_id)); 
        echo '<br>';
    }
    ?>
    
    <h2>Start a training day <?php echo CHtml::link('here', array('/day/create_new')); ?> </h2>
</div>

