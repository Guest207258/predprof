
<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    $t = empty($_GET["t"]) ? 0 : $_GET["t"];
    $id =  empty($_GET["i"]) ? 0 : $_GET["i"];
    $o =  empty($_GET["o"]) ? 1 : $_GET["o"];
    $c =  empty($_GET["c"]) ? 'rgba(240, 99, 132, 1)' : $_GET["c"];
    $d = "?t=$t&i=$id&o=$o";
    $strtemp = "влажность $id";
    switch ($t) {
        default:
        case '0':
            $strtemp = "температура $id";
            break;
        case '1':        
            $strtemp = "влажность $id";
            break;
        case '2':
            $strtemp = "влажность почвы $id";
            break;
        case '3':
            $strtemp = "ср.ариф температура";
            break;
        case '4':
            $strtemp = "ср.ариф влажность";
            break;
    }
?>


<canvas id="myChart<?php echo $id.$t ?>" style="width:100%;max-width:700px"></canvas>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script>
    
    var obj;
    console.log(obj);
    var chart<?php echo $id.$t ?> = new Chart("myChart<?php echo $id.$t ?>", {
            type: "line",
            data: {
                labels: [],
                datasets: [{
                    pointRadius: 4,
                    pointBackgroundColor: "<?php echo $c ?>",

                    fill: false,
                    borderColor: "<?php echo $c ?>",    
                    data: []
                }]
            },
            options: {
                title: {
                    display: true,
                    text: "<?php echo $strtemp?>"
                }
            }
        });
        $.get("stat.php<?php echo $d?>", function (data<?php echo $id.$t ?>) {
            chart<?php echo $id.$t ?>.data.datasets[0].data = data<?php echo $id.$t ?>[1]
            chart<?php echo $id.$t ?>.data.labels = data<?php echo $id.$t ?>[0]
            chart<?php echo $id.$t ?>.update();
        });
    setInterval(() => {
        $.get("stat.php<?php echo $d?>", function (data<?php echo $id.$t ?>) {
            chart<?php echo $id.$t ?>.data.datasets[0].data = data<?php echo $id.$t ?>[1]
            chart<?php echo $id.$t ?>.data.labels = data<?php echo $id.$t ?>[0]
            chart<?php echo $id.$t ?>.update();
        });

    }, 30000);
</script>