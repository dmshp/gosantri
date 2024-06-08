<?php 
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 


$text = "";

$id_link 		= $_GET['id_link'];

// var_dump($id_user);
// var_dump($kode_user);
// die();

$query1 = "DELETE FROM `tabel_link_produk` WHERE `id_link` = '$id_link'";
$n = mysqli_query($koneksi, $query1);
// $m = mysqli_query($koneksi, $query2);

if($n != null){
	$text = "Link Berhasil Di Hapus";
}
else{
	$text = "Link Gagal Di Hapus";
}

echo json_encode($text);

 ?>