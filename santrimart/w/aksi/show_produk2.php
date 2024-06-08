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

$id_produk = $_GET['id_produk'];
$ketQuery = "SELECT * FROM `tabel_barang` WHERE `kd_barang` = $id_produk";
$executeSat = mysqli_query($koneksi, $ketQuery);
$barang=mysqli_fetch_array($executeSat);

$ketQuery = "SELECT * FROM `tabel_stok_toko` WHERE `kd_barang` = $id_produk";
$executeSat = mysqli_query($koneksi, $ketQuery);
$stok=mysqli_fetch_array($executeSat);

$ketQuery = "SELECT * FROM `tabel_barang_gambar` WHERE `id_brg` = $id_produk";
$executeSat = mysqli_query($koneksi, $ketQuery);
$gambar=mysqli_fetch_array($executeSat);


$produk['barang'] = $barang;
$produk['stok'] = $stok;
$produk['gambar'] = $gambar; 
// $varian = $s['varian'];
// $varians = explode(",", $varian)

echo json_encode($produk);

 ?>