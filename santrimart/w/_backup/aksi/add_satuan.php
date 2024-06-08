<?php 
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 
// var_dump($_POST);
// var_dump($_FILES);
//  die;


if(isset($_POST['add_satuan'])){
	$nama = $_POST['satuan'];
	if(!$nama){
		echo "<script>alert('Tambah Satuan');history.back()</script>";
	}


	$query = "INSERT INTO tabel_satuan_barang values('','$nama')";
	$hasil=mysqli_query($koneksi,$query);
	// echo $hasil;
	if($query){
			echo "<script type='text/javascript'>alert('Berhasil Tambah Satuan');history.back()</script>";
		}
}

 ?>