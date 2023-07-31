<?php
error_reporting(0);
	//koneksi ke database
	$konek = mysqli_connect("localhost", "root", "", "kwhmeter");

	date_default_timezone_set("Asia/Makassar");
	$tanggal = date('d/m/Y');
	$jam = date('H:i:s');
	
	//baca data yang dikirim oleh nodemcu
	$tegangan = $_GET["tegangan"];
	$tegangan2 = $_GET["tegangan2"];
	$tegangan3 = $_GET["tegangan3"];
	$arus = $_GET["arus"];
	$arus2 = $_GET["arus2"];
	$arus3 = $_GET["arus3"];
	$daya = $_GET["daya"];
	$daya2 = $_GET["daya2"];
	$daya3 = $_GET["daya3"];
	$energi = $_GET["energi"];
	$energi2 = $_GET["energi2"];
	$energi3 = $_GET["energi3"];
	$cosphi = $_GET["cosphi"];
	$cosphi2 = $_GET["cosphi2"];
	$cosphi3 = $_GET["cosphi3"];
	$frekuensi = $_GET["frekuensi"];
	$frekuensi2 = $_GET["frekuensi2"];
	$frekuensi3 = $_GET["frekuensi3"];
	$biaya = $_GET['biaya'];
	$biaya = number_format($biaya,3,".",",");

	//update data di database (tabel sensor)
	mysqli_query($konek, "ALTER TABLE tb_sensor AUTO_INCREMENT=1");
	$simpan = mysqli_query($konek, "insert into tb_sensor(tanggal, jam, tegangan, arus, daya, energi, cosphi, frekuensi)values
	('$tanggal', '$jam', '$tegangan', '$arus', '$daya', '$energi', '$cosphi', '$frekuensi')");

	mysqli_query($konek, "ALTER TABLE tb_sensors AUTO_INCREMENT=1");
	$simpan = mysqli_query($konek, "insert into tb_sensors(tanggal, jam, tegangan2, arus2, daya2, energi2, cosphi2, frekuensi2)values
	('$tanggal', '$jam', '$tegangan2', '$arus2', '$daya2', '$energi2', '$cosphi2', '$frekuensi2')");

	mysqli_query($konek, "ALTER TABLE tb_sensort AUTO_INCREMENT=1");
	$simpan = mysqli_query($konek, "insert into tb_sensort(tanggal, jam, tegangan3, arus3, daya3, energi3, cosphi3, frekuensi3)values
	('$tanggal', '$jam', '$tegangan3', '$arus3', '$daya3', '$energi3', '$cosphi3', '$frekuensi3')");

	
	mysqli_query($konek, "ALTER TABLE biaya AUTO_INCREMENT=1");
	$simpan = mysqli_query($konek, "insert into biaya (tanggal, jam, biaya) values ('$tanggal', '$jam', '$biaya')");

	
	//update data di database (tabel rekap)
	mysqli_query($konek, "ALTER TABLE tb_rekap AUTO_INCREMENT=1");
	$simpan = mysqli_query($konek, "insert into tb_rekap (tanggal, jam, tegangan, arus, daya, energi, cosphi, frekuensi, tegangan2, arus2, daya2, energi2, cosphi2, frekuensi2,
	tegangan3, arus3, daya3, energi3, cosphi3, frekuensi3) values ('$tanggal', '$jam', '$tegangan', '$arus', '$daya', '$energi', '$cosphi', '$frekuensi', 
	'$tegangan2', '$arus2', '$daya2', '$energi2', '$cosphi2', '$frekuensi2', 
	'$tegangan3', '$arus3', '$daya3', '$energi3', '$cosphi3', '$frekuensi3')");

	
	if($simpan)
		echo "Data Berhasil Dikirim";
	else
		echo "Data Gagal Dikirim";
?>