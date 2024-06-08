<?php 
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
}

$text = "";
$id_user = $_GET['id_user'];
$kd_merchant = $_GET['kd_merchant'];
$ketQuery = "DELETE FROM `tabel_member` WHERE `id_user` = '$id_user'";
$executeUserMaster = mysqli_query($koneksi, $ketQuery);

$ketQuery = "DELETE FROM `tabel_merchant` WHERE `kd_merchant` = '$kd_merchant'";
$executeUserMerchant = mysqli_query($koneksi, $ketQuery);

if($executeUserMaster){
	if($executeUserMerchant){
		$text = "Delete User Merchant Berhasil";
	}
	else{
		$text = "Gagal Delete User Merchant";
	}
}
else{
	$text = "Gagal Delete User Merchant";
}
// $produk['barang'] = $barang;
// $produk['stok'] = $stok;
// $produk['gambar'] = $gambar; 
// // $varian = $s['varian'];
// // $varians = explode(",", $varian)

echo json_encode($text);

 ?>