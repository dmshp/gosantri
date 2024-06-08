<?php 
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 
// var_dump($_POST);
// die;

$kd_toko = $_SESSION['kd_toko'];


if(isset($_POST['daftar-merchant'])){
	$nama = "";
	$email = "";
	$alamat = "";
	$kontak = "";
	$status = "PENDING";
	$password = "";

	$no_faktur = $_POST['no_faktur'];
	$nama_penerima = $_POST['nama_penerima'];
	$kontak = $_POST['kontak'];
	$alamat = $_POST['alamat'];
	$bayar = $_POST['bayar'];
	
	$query = "UPDATE `tabel_penjualan` SET `nama_penerima`='$nama_penerima',`kontak`='$kontak',`alamat`='$alamat' WHERE `no_faktur_penjualan` = '$no_faktur'";
	$hasil=mysqli_query($koneksi,$query);

	if($hasil){
		header("Location: ../page/print_nota.php?faktur=$no_faktur&bayar=$bayar");
	}

}


?>