
<div id="listOfExercises">
    <h2><b class='username'><?php echo $user->name ?>'s </b> exercises of day <?php echo $model->date; ?> </h2>
    <table>
        <tr>
            <th>Exercise</th>
            <th>Reps</th>
            <th>Weight</th>
        </tr>
        <?php foreach ($sets as $set) { ?>
            <tr>
                <td><b><?php echo $set->exercise->name; ?> </b> </td>
                <td>Reps : <?php echo $set->reps ?> </td>
                <td>Weight: <?php echo $set->weight; ?></td>
            </tr>
        <?php } ?>
    </table>
</div>
