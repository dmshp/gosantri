<?php 
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 

// var_dump($_POST);
// die;

if(isset($_POST['edit_satuan'])){
	$satuan = $_POST['satuan'];
	$id = $_POST['id_satuan'];
	
	$query = "UPDATE `tabel_satuan_barang` SET `nm_satuan`='$satuan' WHERE `id_satuan` = '$id'";
	$hasil=mysqli_query($koneksi,$query);
	// echo $hasil;
	if($query){
			echo "<script type='text/javascript'>alert('Berhasil Edit satuan');history.back()</script>";
	}
}

 ?>