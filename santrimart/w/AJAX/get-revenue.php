<?php
include "../inc/koneksi.php";
session_start();
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} else {
}

$satQuery   = "SELECT SUM(jumlah) AS jumlah FROM tabel_rinci_penjualan,tabel_barang WHERE tabel_rinci_penjualan.kd_barang = tabel_barang.kd_barang AND tabel_barang.kd_merchant = $_SESSION[id_user]";
$executeSat = mysqli_query($koneksi, $satQuery);
$array      = array();

while($x = mysqli_fetch_array($executeSat)) {
    $array[] = $x;
}

echo json_encode($array);
// echo json_encode($executeSat);
?>