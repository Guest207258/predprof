<?php 
    include_once 'func.php';
    for($i = 1; $i<=4; $i++){
        $h = get_sensor_tw($i, 1);
        $t = get_sensor_tw($i, 0);
        echo '#'.$i.' t='.$t.' h='.$h. '<br>';    
    };
   
?>
