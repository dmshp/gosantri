<?php 
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 
// var_dump($_POST);
// var_dump($_FILES);
//  die;

$produk = [];
$text = "";

$id_produk = $_GET['id_produk'];
$ketQuery = "DELETE FROM `tabel_barang` WHERE `kd_barang` = '$id_produk'";
$executeSatBarang = mysqli_query($koneksi, $ketQuery);

$ketQuery = "DELETE FROM `tabel_stok_toko` WHERE `kd_barang` = '$id_produk'";
$executeSatStok = mysqli_query($koneksi, $ketQuery);

$ketQuery = "DELETE FROM `tabel_barang_gambar` WHERE `id_brg` = '$id_produk'";
$executeSatGambar = mysqli_query($koneksi, $ketQuery);

if($executeSatBarang){
	if($executeSatStok){
		if($executeSatGambar){
			$text = "Delete Produk Berhasil";
		}
		else{
			$text = "Gagal Delete Gambar";
		}
	}
	else{
		$text = "Gagal Delete Stok";
	}
}
else{
	$text = "Gagal Delete Barang";
}
// $produk['barang'] = $barang;
// $produk['stok'] = $stok;
// $produk['gambar'] = $gambar; 
// // $varian = $s['varian'];
// // $varians = explode(",", $varian)

echo json_encode($text);

 ?>