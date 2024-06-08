<?php 
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 


$text = "";

$id_user 		= $_GET['id_user'];
$kode_user 	= $_GET['kode_user'];

// var_dump($id_user);
// var_dump($kode_user);
// die();

$query1 = "DELETE FROM `tabel_member` WHERE `id_user` = '$id_user'";
// $query2 = "DELETE FROM `tabel_member` WHERE `id_user` = '$id_user'";
$n = mysqli_query($koneksi, $query1);
// $m = mysqli_query($koneksi, $query2);

if($n != null){
	$text = "Delete User Member Berhasil";
}
else{
	$text = "Gagal Delete User Member";
}

echo json_encode($text);

 ?>