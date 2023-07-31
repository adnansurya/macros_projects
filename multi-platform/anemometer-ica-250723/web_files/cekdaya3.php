<?php
	//koneksi ke database
error_reporting(0);
	$konek = mysqli_connect("localhost", "root", "", "kwhmeter");

	//baca isi tabel sensor
	$sql = mysqli_query($konek, "select * from tb_sensort  order by id desc");
	$data = mysqli_fetch_array($sql);
	$daya3 = $data["daya3"];
	if($daya3=="") $daya3 = 0;
	echo $daya3 ;
?>