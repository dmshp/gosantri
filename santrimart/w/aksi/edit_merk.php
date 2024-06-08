<?php 
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 

// var_dump($_POST);
// die;

if(isset($_POST['edit_merk'])){
	$merk = $_POST['merk'];
	$id = $_POST['id_merk'];
	
	$query = "UPDATE `tabel_merk_barang` SET `merk`='$merk' WHERE `id_merk` = '$id'";
	$hasil=mysqli_query($koneksi,$query);
	// echo $hasil;
	if($query){
			echo "<script type='text/javascript'>alert('Berhasil Edit Merk');history.back()</script>";
	}
}

 ?>