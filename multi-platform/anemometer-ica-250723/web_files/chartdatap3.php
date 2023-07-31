<?php
$konek      = mysqli_connect("localhost", "root", "", "kwhmeter");
$sql_ID   = mysqli_query($konek, "SELECT MAX(id) FROM tb_rekap");
$data_ID  = mysqli_fetch_array($sql_ID);
$ID_first  = $data_ID['MAX(id)'];
$ID_last = $ID_first - 9;

$hour       = mysqli_query($konek, "SELECT jam FROM tb_rekap WHERE id>='$ID_last' and id<='$ID_first' ORDER BY id DESC");
$voltage3    = mysqli_query($konek, "SELECT tegangan3 FROM tb_rekap WHERE id>='$ID_last' and id<='$ID_first' ORDER BY id DESC");
$current3    = mysqli_query($konek, "SELECT arus3 FROM tb_rekap WHERE id>='$ID_last' and id<='$ID_first' ORDER BY id DESC");
$power3      = mysqli_query($konek, "SELECT daya3 FROM tb_rekap WHERE id>='$ID_last' and id<='$ID_first' ORDER BY id DESC");
$energy3     = mysqli_query($konek, "SELECT energi3 FROM tb_rekap WHERE id>='$ID_last' and id<='$ID_first' ORDER BY id DESC");
$pf3         = mysqli_query($konek, "SELECT cosphi3 FROM tb_rekap WHERE id>='$ID_last' and id<='$ID_first' ORDER BY id DESC");
$hz3         = mysqli_query($konek, "SELECT frekuensi3 FROM tb_rekap WHERE id>='$ID_last' and id<='$ID_first' ORDER BY id DESC");
?>

<div class="card-body">
    <canvas id="myChartp3" width= "100px;"></canvas>
        <script type="text/javascript"> 
            var canvas = document.getElementById('myChartp3').getContext('2d');
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
                borderColor: "green",
                fill: false,
                data: [
                <?php 
                    while ($data_t = mysqli_fetch_array($power3)) 
                    { 
                        echo $data_t['daya3'].',';
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
                
                var myChart = new Chart ('myChartp3',{
                    type : 'line',
                    data : data,
                    options : option,
                });

        </script>
    </div>