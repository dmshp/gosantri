<?php
session_start();
include '../inc/koneksi.php';

$nama = $_POST['nama'];

$ketQuery = "SELECT * FROM `tabel_kodepos` WHERE `kelurahan` like '%".$nama."%' OR `kecamatan` like '%".$nama."%' LIMIT 100";
$executeSat = mysqli_query($koneksi, $ketQuery);
while ($village = mysqli_fetch_array($executeSat)) {
		echo '<option value="'.$village["kelurahan"].', '.$village["kecamatan"].', '.$village["kabupaten"].', '.$village["provinsi"].', '.$village["kodepos"].'">'.$village["kelurahan"].', '.$village["kecamatan"].', '.$village["kabupaten"].', '.$village["provinsi"].', '.$village["kodepos"].'</option>';
}
?>