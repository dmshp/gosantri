<?php 
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 


$text = "";

$kd_barang 		= $_GET['kd_barang'];
$kd_merchant 	= $_GET['kd_merchant'];

// var_dump($kd_barang);
// var_dump($kd_merchant);
// die();

$query1 = "DELETE FROM tabel_barang WHERE kd_barang = '$kd_barang'";
$query2 = "DELETE FROM tabel_stok_toko WHERE kd_barang = '$kd_barang'";
$query3 = "DELETE FROM tabel_barang_gambar WHERE id_brg = '$kd_barang'";
$m = mysqli_query($koneksi, $query1);
$n = mysqli_query($koneksi, $query2);
$o = mysqli_query($koneksi, $query3);

if($m != null || $n != null || $o != null){
	$text = "Daftar Produk Berhasil Dihapus";
}
else{
	$text = "Gagal Delete Daftar Produk";
}

echo json_encode($text);

 ?>