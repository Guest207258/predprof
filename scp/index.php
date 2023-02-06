<?php 
    include_once 'func.php';
    include_once 'MySQL.php';
    $t_s = 0;
    $hs = 0;
    for($i = 1; $i<=4; $i++){
        $h = get_sensor_tw($i, 1);
        $t = get_sensor_tw($i, 0);
        $t_s = $t_s + $t;
        $hs = $hs + $h;
        echo '#'.$i.' t='.$t.' h='.$h. '<br>';    
    };
    $hs = $hs/4;
    $t_s = $t_s/4;
    echo "средняя влажность=$hs средняя температура=$t_s";
    for($i = 1; $i<=6; $i++){
        $h = get_sensor_p($i);
        echo 'влажность почвы #'.$i.' h='.$h. '<br>';   
    };
    $db = db();
    $sql = "SELECT * FROM `sensor` WHERE 1";
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $date = $row["date"];
            $res = $row["res"];
        }
    }
?>