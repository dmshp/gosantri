<?php 
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 

$faktur = $_GET['faktur'];
$kd_barang = $_GET['kd_barang'];
$ketQuery = "SELECT * FROM `tabel_rinci_penjualan` WHERE `no_faktur_penjualan` = '$faktur' AND `kd_barang` = '$kd_barang'";
$executeSat = mysqli_query($koneksi, $ketQuery);
$s=mysqli_fetch_array($executeSat);
$jml = $s['jumlah'];

echo json_encode($jml);

 ?>