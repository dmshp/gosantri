<?php
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
}

$id = $_GET['kd_kategori'];
$ketQuery = "SELECT * FROM `tabel_kategori_barang` WHERE `kd_kategori` = $id";
$executeSat = mysqli_query($koneksi, $ketQuery);
$tabel_kategori = mysqli_fetch_array($executeSat);

echo json_encode($tabel_kategori);
