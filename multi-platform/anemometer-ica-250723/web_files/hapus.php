<?php
include "koneksi.php";
if (!$konek) {
    die("Koneksi gagal: ".mysqli_connect_error());
}

$d = $_GET['id'];

//sql to delete a record
$sql = "DELETE FROM tb_rekap WHERE id='$d'";
$lokasi = "tables-data.php";
if (mysqli_query($konek, $sql)) {
    echo "Data berhasl dihapus";
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$lokasi.'">';
    //header("location:tables-data.php");
} else {
    echo "Gagal menghapus data: ". mysqli_error($konek);
}

mysqli_close($konek);
?>