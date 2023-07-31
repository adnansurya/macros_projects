<?php
	//koneksi ke database
error_reporting(0);
	
	$konek = mysqli_connect("localhost", "root", "", "monitoring");
	//baca isi tabel sensor
    date_default_timezone_set("Asia/Makassar");
    $tanggal = date('d/m/Y');
    $jam = date('H:i:s');

	$sql = mysqli_query($konek, "select * from tb_rekap order by id desc");
	$data = mysqli_fetch_array($sql);
	
    $sql = "INSERT INTO tb_rekap (tanggal, jam)";
	
    if (mysqli_query($konek, $sql)) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($konek);
    }
    
    mysqli_close($konek);

    //header('Location: index1.php');
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index1.php">';
    exit;
?>