<?php
$konek      = mysqli_connect("localhost", "root", "", "kwhmeter");
$sql_ID   = mysqli_query($konek, "SELECT MAX(id) FROM tb_rekap");
$data_ID  = mysqli_fetch_array($sql_ID);
$ID_first  = $data_ID['MAX(id)'];
$ID_last = $ID_first - 9;

$hour       = mysqli_query($konek, "SELECT jam FROM tb_rekap WHERE id>='$ID_last' and id<='$ID_first' ORDER BY id DESC");
$voltage    = mysqli_query($konek, "SELECT tegangan FROM tb_rekap WHERE id>='$ID_last' and id<='$ID_first' ORDER BY id DESC");
$current    = mysqli_query($konek, "SELECT arus FROM tb_rekap WHERE id>='$ID_last' and id<='$ID_first' ORDER BY id DESC");
$power      = mysqli_query($konek, "SELECT daya FROM tb_rekap WHERE id>='$ID_last' and id<='$ID_first' ORDER BY id DESC");
$energy     = mysqli_query($konek, "SELECT energi FROM tb_rekap WHERE id>='$ID_last' and id<='$ID_first' ORDER BY id DESC");
$pf         = mysqli_query($konek, "SELECT cosphi FROM tb_rekap WHERE id>='$ID_last' and id<='$ID_first' ORDER BY id DESC");
$hz         = mysqli_query($konek, "SELECT frekuensi FROM tb_rekap WHERE id>='$ID_last' and id<='$ID_first' ORDER BY id DESC");
?>

<div class="card-body">
    <canvas id="myChartp" width= "100px;"></canvas>
        <script type="text/javascript"> 
            var canvas = document.getElementById('myChartp').getContext('2d');
            var data = {
                labels : [
                    <?php 
                        while ($data_jam = mysqli_fetch_array($hour)) 
                        { 
                        echo '"'.$data_jam['jam'].'",';
                        }
                    ?>
                ],
            datasets: [
                {
                label : "Daya",
                borderColor: "blue",
                fill: false,
                data: [
                <?php 
                    while ($data_r = mysqli_fetch_array($power)) 
                    { 
                        echo $data_r['daya'].',';
                    }
                ?>
                ],
            },
            ]
                    };

                var option = {
                    responsive : true,
                    showLines : true,
                    animation : {duration : 0},
                    legend: {display: true},
                };
                
                var myChart = new Chart ('myChartp',{
                    type : 'line',
                    data : data,
                    options : option,
                });

        </script>
    </div>