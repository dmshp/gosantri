<?php
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
}

$id = $_GET['id'];
if (!$id) {
    echo "<script>alert('Data Kosong');history.back()</script>";
    return false;
}
$ketQuery = "SELECT *FROM tabel_member_alamat WHERE id_alamat='$id'";
$executeSat = mysqli_query($koneksi, $ketQuery);
$alamat = mysqli_fetch_array($executeSat);

echo json_encode($alamat);
