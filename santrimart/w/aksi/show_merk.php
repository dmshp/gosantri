<?php
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 

$id = $_GET['kd_merk'];
$ketQuery = "SELECT * FROM `tabel_merk_barang` WHERE `id_merk` = $id";
$executeSat = mysqli_query($koneksi, $ketQuery);
$tabel_merk = mysqli_fetch_array($executeSat);

echo json_encode($tabel_merk);
