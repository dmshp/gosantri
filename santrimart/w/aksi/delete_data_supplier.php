<?php 
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 


$text = "";

$kd_supplier 		= $_GET['kd_supplier'];

// var_dump($id_user);
// var_dump($kd_supplier);
// die();

$query1 = "DELETE FROM tabel_supplier WHERE kd_supplier = '$kd_supplier'";
$n = mysqli_query($koneksi, $query1);
// $m = mysqli_query($koneksi, $query2);

if($n != null){
	$text = "Data Berhasil Di Hapus";
}
else{
	$text = "Data Gagal Di Hapus";
}

echo json_encode($text);

 ?>