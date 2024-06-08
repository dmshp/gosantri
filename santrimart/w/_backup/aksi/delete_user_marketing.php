<?php 
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
}

$text = "";
$id_user = $_GET['id_user'];
$id_marketing = $_GET['id_marketing'];
$ketQuery = "DELETE FROM `tabel_member` WHERE `id_user` = '$id_user'";
$executeUserMaster = mysqli_query($koneksi, $ketQuery);

$ketQuery = "DELETE FROM `tabel_marketing` WHERE `id_marketing` = '$id_marketing'";
$executeUserMarketing = mysqli_query($koneksi, $ketQuery);

if($executeUserMaster){
	if($executeUserMarketing){
		$text = "Delete User Marketing Berhasil";
	}
	else{
		$text = "Gagal Delete User Marketing";
	}
}
else{
	$text = "Gagal Delete User Marketing";
}
// $produk['barang'] = $barang;
// $produk['stok'] = $stok;
// $produk['gambar'] = $gambar; 
// // $varian = $s['varian'];
// // $varians = explode(",", $varian)

echo json_encode($text);

 ?>