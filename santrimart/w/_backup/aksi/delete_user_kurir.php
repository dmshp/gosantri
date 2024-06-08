<?php 
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
}

$text = "";
$id_user = $_GET['id_user'];
$id_kurir = $_GET['id_kurir'];
$ketQuery = "DELETE FROM `tabel_member` WHERE `id_user` = '$id_user'";
$executeUserMaster = mysqli_query($koneksi, $ketQuery);

$ketQuery = "DELETE FROM `tabel_kurir` WHERE `id_kurir` = '$id_kurir'";
$executeUserKurir = mysqli_query($koneksi, $ketQuery);

if($executeUserMaster){
	if($executeUserKurir){
		$text = "Delete User Kurir Berhasil";
	}
	else{
		$text = "Gagal Delete User Kurir";
	}
}
else{
	$text = "Gagal Delete User Kurir";
}
// $produk['barang'] = $barang;
// $produk['stok'] = $stok;
// $produk['gambar'] = $gambar; 
// // $varian = $s['varian'];
// // $varians = explode(",", $varian)

echo json_encode($text);

 ?>