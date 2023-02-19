<?php
    function curl_defualt($ch, $r){
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT_MS, 1000);
        curl_setopt($ch,CURLOPT_NOSIGNAL, 1);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
        if($r){
            $result = curl_exec($ch);
            curl_close($ch);
            return $result;
        }
        else{curl_exec($ch);}
        curl_close($ch);
    }
    function get_sensor_tw($id, $type){
        $ret = "";
        $ch = curl_init("https://dt.miet.ru/ppo_it/api/temp_hum/$id");
        $result = curl_defualt($ch, true);
        $result = json_decode($result, true);
        switch ($type) {
            case '0':
                $ret = $result["temperature"];
                break;
            case '1':
                $ret = $result["humidity"];
                break;
            
            default:
                
                break;
        }
        return $ret;
    }
    function get_sensor_p($id){
        $ret = "";
        $ch = curl_init("https://dt.miet.ru/ppo_it/api/hum/$id");
        $result = curl_defualt($ch, true);
        $result = json_decode($result, true);
        $ret = $result["humidity"];
        return($ret);
    
    }
    function am($array){
        $b = [];
        for ($i=0; $i < count($array[0]); $i++) { 
            $bc = 0;
            for ($k=0; $k < count($array); $k++) { 
                $bc += $array[$k][$i];
            }
            $bc = $bc/count($array);
            $b[$i] = $bc;
        }
        return $b;
    }
    function ns_d($db, $id, $type, $result){
        $date = date("Y-m-d H:i:s");
        $sql = 'INSERT INTO `sensor`(`id_tw`, `type`, `date`, `res`) VALUES ('.$id.','.$type.',"'.$date.'", "'.$result.'")';
        $result = mysqli_query($db, $sql);
        var_dump($result);

        
    }
?>