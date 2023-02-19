<?php 
    
    include_once 'func/func.php';
    include_once 'func/MySQL.php';
    $db = db();
    while (True) {
        $t_s = 0;
        $hs = 0;
        for($i = 1; $i<=4; $i++){   
            $h = get_sensor_tw($i, 1);
            $t = get_sensor_tw($i, 0);
            ns_d($db, $i, 0, $t);
            ns_d($db, $i, 1, $h);
            $t_s = $t_s + $t;
            $hs = $hs + $h;
            echo '#'.$i.' t='.$t.' h='.$h;    
        };
        $hs = $hs/4;
        $t_s = $t_s/4;
        ns_d($db, 0, 3, $t_s);
        ns_d($db, 0, 4, $hs);
        echo "\$hs=$hs \$t_s=$t_s";
        for($i = 1; $i<=6; $i++){
            $h = get_sensor_p($i);
            ns_d($db, $i, 2, $h);
            echo '#'.$i.' hs='.$h. '<br>';   
        }
        for ($i=1; $i <= 4; $i++) { 
            echo '<div id="graphs'.$i.'" class="graphs"></div>';
        }
        sleep(60);
    }
?>