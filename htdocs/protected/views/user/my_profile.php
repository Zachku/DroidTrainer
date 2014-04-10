<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/myprofilejs.js', CClientScript::POS_END); ?>

<h1>Welcome to your profile <b class="username"><?php echo $user->name; ?></b></h1>
<p>Here you can change your personal information, see all your training days listed and start and new training day.<p>
<p>Please, enjoy your workout.<p>
<h2>Your training days</h2>
<table class ="days">
    <tr> <th>Date</th> <th>Delete</th> </tr>
    <?php foreach ($days as $day) { ?>
        <tr>
            <td><?php echo CHtml::link($day->date, array('/day/view', 'id' => $day->day_id)); ?></td>
            <td><?php echo CHtml::link("Delete", '#', array(
                'submit' => array('day/delete', "id" => $day->day_id),
                'confirm' => 'Are you sure you want to delete?')); ?></td>
        </tr>
    <?php } ?>
</table>

<h2>Start a new training day <?php echo CHtml::link('here', array('/day/create_new')); ?> </h2>

<h2>Edit your profile  <?php echo CHtml::link("here", "", array('id' => 'editProfileLink')); ?> </h2>
<div class="editProfile">
    <div class="form">

        <?php echo CHtml::button("Hide", array('id' => "hideEditProfile", 'type' => 'submit')); ?>
        <?php echo CHtml::beginForm(array('user/update', 'id' => $user->user_id), 'post'); ?>
        <div class="row"> 
            <?php echo CHtml::activeLabel($user, 'name'); ?>
            <?php echo CHtml::activeTextField($user, 'name', array('value' => $user->name)); ?> 
        </div>
        <div class="row"> 
            <?php echo CHtml::activeLabel($user, 'email'); ?>
            <?php echo CHtml::activeTextField($user, 'email', array('value' => $user->email)); ?> 
        </div>
        <div class="row"> 
            <?php echo CHtml::activeLabel($user, 'password'); ?>
            <?php echo CHtml::activePasswordField($user, 'password', array('value' => $user->password)); ?> 
        </div>
        <div class="row"> 
            <?php echo CHtml::submitButton('Save', array('confirm' => 'Are you sure you want to change your account information?')); ?> 
        </div>
        <?php echo CHtml::endForm(); ?>
    </div>
</div>


