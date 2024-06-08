<?php
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 

$id = $_GET['kd_satuan'];
$ketQuery = "SELECT * FROM `tabel_satuan_barang` WHERE `id_satuan` = $id";
$executeSat = mysqli_query($koneksi, $ketQuery);
$tabel_satuan = mysqli_fetch_array($executeSat);

echo json_encode($tabel_satuan);
