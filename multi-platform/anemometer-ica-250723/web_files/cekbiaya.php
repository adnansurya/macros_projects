<?php
	//koneksi ke database
error_reporting(0);
	
	$konek = mysqli_connect("localhost", "root", "", "kwhmeter");
	//baca isi tabel sensor
	$sql = mysqli_query($konek, "select * from biaya order by id desc");
	$data = mysqli_fetch_array($sql);
	$biaya = $data["biaya"];
	
	if($biaya=="") $biaya = 0;
	
	echo $biaya ;
?>