<?php 
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 

$text = "";

$id = $_GET['id'];
$ketQuery = "DELETE FROM `tabel_retur` WHERE `id` = '$id'";
$executeSat = mysqli_query($koneksi, $ketQuery);

if($executeSat){
	$text = "Delete Retur Berhasil";
}
else{
	$text = "Gagal Delete Retur";
}

echo json_encode($text);

 ?>