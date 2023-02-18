<?php   
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include_once 'func/func.php';
    include_once 'func/MySQL.php';
    $db = db();
    $t_s = 0;
    $hs = 0;
    for($i = 1; $i<=4; $i++){   
        $h = get_sensor_tw($i, 1);
        $t = get_sensor_tw($i, 0);
        ns_d($db, $i, 0, $t);
        ns_d($db, $i, 1, $h);
        $t_s = $t_s + $t;
        $hs = $hs + $h;
        echo '#'.$i.' t='.$t.' h='.$h. '<br>';    
    };
    $hs = $hs/4;
    $t_s = $t_s/4;
    echo "средняя влажность=$hs средняя температура=$t_s";
    for($i = 1; $i<=6; $i++){
        $h = get_sensor_p($i);
        ns_d($db, $i, 2, $h);
        echo 'влажность почвы #'.$i.' h='.$h. '<br>';   
    };
    
?>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<figure class="highcharts-figure">
    <div id="container"></div>
</figure>

<div id="container"></div>
<script>
    Highcharts.chart('container', {

    title: {
    text: 'Logarithmic axis demo'
    },

    xAxis: {
    tickInterval: 1,
    type: 'logarithmic',
    accessibility: {
        rangeDescription: 'Range: 1 to 10'
    }
    },

    yAxis: {
    type: 'logarithmic',
    minorTickInterval: 0.1,
    accessibility: {
        rangeDescription: 'Range: 0.1 to 1000'
    }
    },

    tooltip: {
    headerFormat: '<b>{series.name}</b><br />',
    pointFormat: 'x = {point.x}, y = {point.y}'
    },

    series: [{
    data: [1, 2, 4, 8, 16, 32, 64, 128, 256, 512],
    pointStart: 1
    }]
    });
</script>
