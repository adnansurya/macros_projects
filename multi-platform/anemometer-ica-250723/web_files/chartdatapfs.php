<?php
$konek      = mysqli_connect("localhost", "root", "", "kwhmeter");
$sql_ID   = mysqli_query($konek, "SELECT MAX(id) FROM tb_rekap");
$data_ID  = mysqli_fetch_array($sql_ID);
$ID_first  = $data_ID['MAX(id)'];
$ID_last = $ID_first - 9;

$hour       = mysqli_query($konek, "SELECT jam FROM tb_rekap WHERE id>='$ID_last' and id<='$ID_first' ORDER BY id DESC");
$voltage    = mysqli_query($konek, "SELECT tegangan FROM tb_rekap WHERE id>='$ID_last' and id<='$ID_first' ORDER BY id DESC");
$voltage2   = mysqli_query($konek, "SELECT tegangan2 FROM tb_rekap WHERE id>='$ID_last' and id<='$ID_first' ORDER BY id DESC");
$voltage3   = mysqli_query($konek, "SELECT tegangan3 FROM tb_rekap WHERE id>='$ID_last' and id<='$ID_first' ORDER BY id DESC");
$current    = mysqli_query($konek, "SELECT arus FROM tb_rekap WHERE id>='$ID_last' and id<='$ID_first' ORDER BY id DESC");
$current2   = mysqli_query($konek, "SELECT arus2 FROM tb_rekap WHERE id>='$ID_last' and id<='$ID_first' ORDER BY id DESC");
$current3   = mysqli_query($konek, "SELECT arus3 FROM tb_rekap WHERE id>='$ID_last' and id<='$ID_first' ORDER BY id DESC");
$power      = mysqli_query($konek, "SELECT daya FROM tb_rekap WHERE id>='$ID_last' and id<='$ID_first' ORDER BY id DESC");
$power2     = mysqli_query($konek, "SELECT daya2 FROM tb_rekap WHERE id>='$ID_last' and id<='$ID_first' ORDER BY id DESC");
$power3     = mysqli_query($konek, "SELECT daya3 FROM tb_rekap WHERE id>='$ID_last' and id<='$ID_first' ORDER BY id DESC");
$energy     = mysqli_query($konek, "SELECT energi FROM tb_rekap WHERE id>='$ID_last' and id<='$ID_first' ORDER BY id DESC");
$energy2    = mysqli_query($konek, "SELECT energi2 FROM tb_rekap WHERE id>='$ID_last' and id<='$ID_first' ORDER BY id DESC");
$energy3    = mysqli_query($konek, "SELECT energi3 FROM tb_rekap WHERE id>='$ID_last' and id<='$ID_first' ORDER BY id DESC");
$pf         = mysqli_query($konek, "SELECT cosphi FROM tb_rekap WHERE id>='$ID_last' and id<='$ID_first' ORDER BY id DESC");
$pf2        = mysqli_query($konek, "SELECT cosphi2 FROM tb_rekap WHERE id>='$ID_last' and id<='$ID_first' ORDER BY id DESC");
$pf3        = mysqli_query($konek, "SELECT cosphi3 FROM tb_rekap WHERE id>='$ID_last' and id<='$ID_first' ORDER BY id DESC");
$hz         = mysqli_query($konek, "SELECT frekuensi FROM tb_rekap WHERE id>='$ID_last' and id<='$ID_first' ORDER BY id DESC");
$hz2        = mysqli_query($konek, "SELECT frekuensi2 FROM tb_rekap WHERE id>='$ID_last' and id<='$ID_first' ORDER BY id DESC");
$hz3        = mysqli_query($konek, "SELECT frekuensi3 FROM tb_rekap WHERE id>='$ID_last' and id<='$ID_first' ORDER BY id DESC");
?>

<div class="card-body">
    <canvas id="myChartpfs" width= "100px;"></canvas>
        <script type="text/javascript"> 
            var canvas = document.getElementById('myChartpfs').getContext('2d');
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
                label : "Data R",
                borderColor: "blue",
                fill: false,
                data: [
                <?php 
                    while ($data_r = mysqli_fetch_array($pf)) 
                    { 
                        echo $data_r['cosphi'].',';
                    }
                ?>
                ],
            },
            {
                label : "Data S",
                borderColor: "red",
                fill: false,
                data: [
                <?php 
                    while ($data_s = mysqli_fetch_array($pf2)) 
                    { 
                        echo $data_s['cosphi2'].',';
                    }
                ?>
                ],
            },
            {
                label : "Data T",
                borderColor: "green",
                fill: false,
                data: [
                <?php 
                    while ($data_t = mysqli_fetch_array($pf3)) 
                    { 
                        echo $data_t['cosphi3'].',';
                    }
                ?>
                ],
            }
            ]
                    };

                var option = {
                    responsive : true,
                    showLines : true,
                    animation : {duration : 0},
                    legend: {display: true},
                };
                
                var myChart = new Chart ('myChartpfs',{
                    type : 'line',
                    data : data,
                    options : option,
                });

        </script>
    </div>