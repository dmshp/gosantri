<?php 
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 

$id = $_GET['id'];
if (!$id) {
    echo "<script>alert('Data Kosong');history.back()</script>";
    return false;
}

$query_delete= mysqli_query($koneksi,"DELETE FROM `tabel_slide` WHERE id_slide= $id") ;

if($query_delete){
	echo "Hapus data berhasil";
}
else{
	echo "Hapus data gagal";
	}
// if(isset($_GET['hapus_ads'])){

    
// }
?>
