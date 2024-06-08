<?php 
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 


$text = "";

$kd_supplier = $_GET['kd_supplier'];
$status 	 = $_GET['status'];
$id_user     = $_SESSION['id_user'];
$kode_user   = $_SESSION['kode_user'];
$nm_user     = $_SESSION['nm_user'];

// var_dump($id_user);
// var_dump($kd_supplier);
// die();

if ($status == 0) {
    $query = "UPDATE tabel_supplier SET aktif=1, modidt = NOW(), modiusr = '$nm_user' WHERE kd_supplier = '$kd_supplier'";
} else {
    $query = "UPDATE tabel_supplier SET aktif=0, modidt = NOW(), modiusr = '$nm_user' WHERE kd_supplier = '$kd_supplier'";
}
$n = mysqli_query($koneksi, $query);
// $m = mysqli_query($koneksi, $query2);

if($n != null){
	$text = "Status Berhasil Di Ubah";
}
else{
	$text = "Status Gagal Di Ubah";
}

echo json_encode($text);

 ?>