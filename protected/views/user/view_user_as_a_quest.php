<h1><b class='username'><?php echo $user->name ?>'s </b> public profile</h1>
<h1>Training days</h1>

<table class='dayList'>
    <tr><th>Date</th></tr>
    <?php foreach ($public_training_days as $day) { ?>
    <tr>
        <td><?php echo CHtml::link($day->date, array('day/public_view', 'id'=>$day->day_id)); ?></td>
    </tr>
    <?php } ?>
</table>