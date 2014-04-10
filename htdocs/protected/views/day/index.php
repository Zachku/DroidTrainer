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

<table>
    <tr><th>Date</th><th>Id</th></tr>
    <?php foreach ($days as $day) {?>
    <tr>
        <td><?php echo $day->date; ?></td>
        <td><?php echo $day->day_id; ?></td>
    </tr>
    <?php }?>
    
    
</table>
