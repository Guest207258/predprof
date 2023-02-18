<?php
    function db(){
        $name = "pred";
        $pass = "a.xZJC3][8-3TM)e";
        $host = "localhost";
        $db = mysqli_connect($host,$name,$pass,$name);
        return $db;
    }
?>  