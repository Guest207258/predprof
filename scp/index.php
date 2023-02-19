<link rel="stylesheet" href="css/style.css">
<title>ПредПроф</title>
<div class="graphsBoxs">
    <div class="graphsBoxL">
    <?php   
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        include_once 'func/func.php';
        include_once 'func/MySQL.php';

        $o = 300;
        $db = db();
        for ($i=1; $i <= 4; $i++) { 
            echo '<div id="graphs'.$i.'0" class="graphs"></div>';
        }
    ?>
    <div id="graphs334" class="graphs"></div>
    </div>
    <div class="graphsBox">
    <?php
        for ($i=1; $i <= 4; $i++) { 
            echo '<div id="graphs'.$i.'1" class="graphs"></div>';
        }
    ?>
    <div class="graphsBoxCL">
    <?php
        for ($i=1; $i <= 3; $i++) { 
            echo '<div id="graphs'.$i.'2" class="graphs"></div>';
        }
    ?>
    </div>
    <div class="graphsBoxCR">
    <?php
        for ($i=3; $i <= 6; $i++) { 
            echo '<div id="graphs'.$i.'2" class="graphs"></div>';
        }
    ?>
    </div>
    <div class="graphsBox">
    <?php
        for ($i=1; $i <= 4; $i++) { 
            echo '<div id="graphs'.$i.'1" class="graphs"></div>';
        }
    ?>
    <div id="graphs434" class="graphs"></div>
    </div>
    <div class="graphsBoxC">
        <form action="" method="get">
            <input type="number" name="t" id="" value="28">
            <input type="number" name="h" id="" value="60">
            <input type="number" name="hm" id="" value="60">
            <input type="submit" value="Сохранить">
        </form>
        <a href="" class="graphsBoxC">

        </a>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
    function f() {
        for (let i = 1; i <= 4; i++) {
            $('#graphs'+i+'0').load('graph.php?c=rgba(41,158,0,1)&i='+i+'&o='+<?php echo $o?>)
            console.log('#graphs'+i+'0');
        }   
        for (let i = 1; i <= 4; i++) {
            $('#graphs'+i+'1').load('graph.php?i='+i+'&o='+<?php echo $o?>+'&t=1&c=rgba(0,158,158,1)')
            console.log('graph.php?i='+i+'&o='+<?php echo $o?>);
        }
        for (let i = 1; i <= 6; i++) {
            $('#graphs'+i+'2').load('graph.php?i='+i+'&o='+<?php echo $o?>+'&t=2&c=rgba(0,158,158,1)')
        }     
       
        $('#graphs334').load('graph.php?i=0&o='+<?php echo $o?>+'&t=3&c=rgba(41,158,0,1)')
        $('#graphs434').load('graph.php?i=0&o='+<?php echo $o?>+'&t=4&c=rgba(0,158,158,1)')
    }
    f()
</script>
