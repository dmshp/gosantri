<?php 
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 
// var_dump($_POST);
// var_dump($_FILES);
//  die;
$produk = [];
$produk_nama = [];
$produk_kode = [];
$faktur = $_GET['faktur'];
$ketQuery = "SELECT * FROM `tabel_rinci_penjualan` WHERE `no_faktur_penjualan` = '$faktur'";
$executeSat = mysqli_query($koneksi, $ketQuery);
$i = 0;
while ($s=mysqli_fetch_array($executeSat)) {
	$produk_nama[$i] = $s['nm_barang'];
	$produk_kode[$i] = $s['kd_barang'];
	$i++;
}

$s=mysqli_fetch_array($executeSat);
$produk['nama'] = $produk_nama;
$produk['kode'] = $produk_kode;

echo json_encode($produk);

 ?>