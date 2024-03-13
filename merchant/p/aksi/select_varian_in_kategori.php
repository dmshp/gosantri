<?php 
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 
// var_dump($_POST);
// var_dump($_FILES);
//  die;

$id_kategori = $_GET['id_kategori'];
$ketQuery = "SELECT `varian` FROM `tabel_kategori_barang` WHERE `kd_kategori` = $id_kategori";
$executeSat = mysqli_query($koneksi, $ketQuery);
$s=mysqli_fetch_array($executeSat);
$varian = $s['varian'];
// $varians = explode(",", $varian)

echo json_encode($varian);

 ?>