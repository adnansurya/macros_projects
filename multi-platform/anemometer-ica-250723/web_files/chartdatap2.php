<?php
$konek      = mysqli_connect("localhost", "root", "", "kwhmeter");
$sql_ID   = mysqli_query($konek, "SELECT MAX(id) FROM tb_rekap");
$data_ID  = mysqli_fetch_array($sql_ID);
$ID_first  = $data_ID['MAX(id)'];
$ID_last = $ID_first - 9;

$hour       = mysqli_query($konek, "SELECT jam FROM tb_rekap WHERE id>='$ID_last' and id<='$ID_first' ORDER BY id DESC");
$voltage2    = mysqli_query($konek, "SELECT tegangan2 FROM tb_rekap WHERE id>='$ID_last' and id<='$ID_first' ORDER BY id DESC");
$current2    = mysqli_query($konek, "SELECT arus2 FROM tb_rekap WHERE id>='$ID_last' and id<='$ID_first' ORDER BY id DESC");
$power2      = mysqli_query($konek, "SELECT daya2 FROM tb_rekap WHERE id>='$ID_last' and id<='$ID_first' ORDER BY id DESC");
$energy2     = mysqli_query($konek, "SELECT energi2 FROM tb_rekap WHERE id>='$ID_last' and id<='$ID_first' ORDER BY id DESC");
$pf2         = mysqli_query($konek, "SELECT cosphi2 FROM tb_rekap WHERE id>='$ID_last' and id<='$ID_first' ORDER BY id DESC");
$hz2         = mysqli_query($konek, "SELECT frekuensi2 FROM tb_rekap WHERE id>='$ID_last' and id<='$ID_first' ORDER BY id DESC");
?>

<div class="card-body">
    <canvas id="myChartp2" width= "100px;"></canvas>
        <script type="text/javascript"> 
            var canvas = document.getElementById('myChartp2').getContext('2d');
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
                borderColor: "red",
                fill: false,
                data: [
                <?php 
                    while ($data_s = mysqli_fetch_array($power2)) 
                    { 
                        echo $data_s['daya2'].',';
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
                
                var myChart = new Chart ('myChartp2',{
                    type : 'line',
                    data : data,
                    options : option,
                });

        </script>
    </div>