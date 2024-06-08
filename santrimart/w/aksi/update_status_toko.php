
<?php 
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 


$text = "";

$id_setting 	= $_GET['id_setting'];
$nm_user     = $_SESSION['nm_user'];

if ($id_setting != '') {

$query = mysqli_fetch_array(mysqli_query($koneksi, "SELECT aktif FROM tabel_setting_toko WHERE id_setting = '$id_setting'"));

// var_dump($query['aktif']); die();

if ($query['aktif'] == 0) {
	$status = 1;
} else {
	$status = 0;
}

$ketQuery = "UPDATE `tabel_setting_toko` SET aktif = '$status', modidt = now(), modiusr = '$nm_user' WHERE `id_setting` = '$id_setting'";
$executeUpdateStatus = mysqli_query($koneksi, $ketQuery);

	if($executeUpdateStatus){
		$text = "Status Toko berhasil di ubah";
	}
	else{
		$text = "Data Tidak Valid";
	}

}

echo json_encode($text);

?>