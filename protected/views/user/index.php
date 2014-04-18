<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Users',
);

?>

<h1>Users</h1>

<?php /*$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); */?>

<table class="userList">
    <tr><th>Username</th></tr>
    <?php     foreach ($users as $user) {?>
    <tr><td><?php echo CHtml::link($user->name, array('user/view_user_as_a_quest', 'id'=>$user->user_id)); ?></td></tr>
    <?php } ?>
</table>
