
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