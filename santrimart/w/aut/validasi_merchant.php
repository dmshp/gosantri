<?php 
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 

$kode_user = $_POST['kode_user'];
$ketQuery = "UPDATE `tabel_member` SET `stt_user`= 'AKTIF' WHERE `kode_user` = '$kode_user'";
$executeSat = mysqli_query($koneksi, $ketQuery);

echo json_encode($executeSat);

?>