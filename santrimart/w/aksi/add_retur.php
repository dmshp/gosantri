<?php 
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 
// var_dump($_POST);
// die;
$faktur = "";
$kd_barang = "";
$jml = "";
$ket = "";	

if(isset($_POST['retur'])){

	if(isset($_POST['faktur'])){
		$faktur = $_POST['faktur'];
	}
	if(isset($_POST['produk'])){
		$kd_barang = $_POST['produk'];
	}
	if(isset($_POST['jml'])){
		$jml = $_POST['jml'];
	}
	if(isset($_POST['ket'])){
		$ket = $_POST['ket'];
	}

	$id_user = $_SESSION['id_user'];

	$query = "INSERT INTO `tabel_retur`(`no_faktur_retur`, `kd_barang`, `tgl_retur`, `id_user`, `total_retur`,`ket`) VALUES ('$faktur','$kd_barang',now(),'$id_user','$jml','$ket')";
	$hasil=mysqli_query($koneksi,$query);
	// echo $hasil;
	if($query){
			echo "<script type='text/javascript'>alert('Input Data Retur Berhasil');history.back()</script>";
		}
}

 ?>