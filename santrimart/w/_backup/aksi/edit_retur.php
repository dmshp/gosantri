<?php 
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 
// var_dump($_POST);
// die;

$id_retur = "";
$jml = "";
$ket = "";	

if(isset($_POST['edit_retur'])){

	if(isset($_POST['id_retur'])){
		$id_retur = $_POST['id_retur'];
	}
	if(isset($_POST['jml'])){
		$jml = $_POST['jml'];
	}
	if(isset($_POST['ket'])){
		$ket = $_POST['ket'];
	}

	$id_user = $_SESSION['id_user'];

	$query = "UPDATE `tabel_retur` SET `total_retur`='$jml',`ket`='$ket' WHERE `id` = '$id_retur'";
	$hasil=mysqli_query($koneksi,$query);
	// echo $hasil;
	if($query){
			echo "<script type='text/javascript'>alert('Edit Data Retur Berhasil');history.go(-2)</script>";
		}
}

 ?>