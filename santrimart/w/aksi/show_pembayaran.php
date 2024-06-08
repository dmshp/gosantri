<?php
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 
// var_dump($_POST);
// var_dump($_FILES);
//  die;

$id = $_GET['id'];
$ketQuery = "SELECT *, tp.urutan as urut FROM tabel_pembayaran tp
								INNER JOIN tabel_kategori_pembayaran tkp on tp.kd_kategori_pembayaran= tkp.kd_kategori_pembayaran
								WHERE kd_pembayaran='$id'";
$executeSat = mysqli_query($koneksi, $ketQuery);
$pembayaran = mysqli_fetch_array($executeSat);

echo json_encode($pembayaran);
