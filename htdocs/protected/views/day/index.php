<?php
/* @var $this DayController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Days',
);
/*
$this->menu=array(
	array('label'=>'Create Day', 'url'=>array('create')),
	array('label'=>'Manage Day', 'url'=>array('admin')),
);
 * 
 */
?>

<h1>Days</h1>

<table class='dayList'>
    <tr><th>Date</th></tr>
    <?php foreach ($days as $day) {?>
    <tr>
        <td><?php echo CHtml::link($day->date, array('day/view', 'id'=>$day->day_id)); ?></td>
    </tr>
    <?php }?>
    
    
</table>
