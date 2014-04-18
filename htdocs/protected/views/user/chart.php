
<div id="data">
    <?php
    $this->widget('ext.Hzl.google.HzlVisualizationChart', array('visualization' => 'LineChart',
        'data' => $data,
        'options' => array(
            'title' => 'Performance of your workout',
            'titleTextStyle' => array('color' => '#FF0000'),
            'vAxis' => array(
                'title' => 'Reps',
                'gridlines' => array(
                    'color' => 'transparent'  //set grid line transparent
                )),
            'hAxis' => array('title' => 'Weight'),
            'curveType' => 'function', //smooth curve or not
            'legend' => array('position' => 'bottom'),
    )));
    ?>
</div>
<div id="data2"> 
</div>
<div id="addSetForm">
    <div class="form">
        <?php echo CHtml::beginForm(array('user/chart'), 'post'); ?>

        <div class="row"> 
            <?php echo CHtml::label('Exercise', false); ?>
            <?php
            echo CHtml::activeDropDownList($set_model, 'exercise_id', $exercises, array(
                'prompt' => 'Choose exercise:',
                'ajax' => array(
                    'type' => 'POST', //request type
                    'url' => CController::createUrl('user/updateWeight'), //url to call. //Style: CController::createUrl('currentController/methodToCall')
                    'update' => '#weight',)));
            ?> 
        </div>
        <div id="weight">
            <div class="row"> 
                <?php echo CHtml::label('Weight', false); ?>
                <?php echo CHtml::activeDropDownList($set_model, 'weight', $weights, array('prompt' => 'Choose weight:')); ?> 
            </div>
        </div>
        <div class="row"> 
            <?php echo CHtml::submitButton("Update data"); ?> 
        </div>
        <?php echo CHtml::endForm(); ?>
    </div>
</div>


