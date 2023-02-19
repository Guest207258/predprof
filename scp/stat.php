<?php 
    header('Content-Type: application/json; charset=utf-8');
    include_once 'func/MySQL.php';
    $db = db();
    $t = empty($_GET["t"]) ? 0 : $_GET["t"];
    $id =  empty($_GET["i"]) ? 0 : $_GET["i"];
    $o =  empty($_GET["o"]) ? 1 : $_GET["o"];
    $sql = "SELECT * FROM `sensor` WHERE `id_tw` = $id AND `type` = $t GROUP BY FLOOR(`date` / $o) ORDER BY `sensor`.`date` DESC  LIMIT 10"; 
    $result = mysqli_query($db,$sql);
    $dat = "";
    $re = "";
    
    if(mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)) {
            $res = $row["res"];
            $date = $row["date"];
            $date = strtotime($date);
            $date = date("H:i",$date);
            $dat = "$date,$dat";
            $re = "$res,$re";
        }
    }
    $std = explode(",", $dat,-1);
    $str = explode(",", $re,-1);
    $st = [];
    $st[0] = $std;
    $st[1] = $str;
    echo json_encode($st)
?>