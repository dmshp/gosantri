<?php
session_start();
include "../inc/config.php";
if(isset($_POST['aksi'])){
$nama = $_POST['nama'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];
$almt = $_POST['alamat'];
$query = "INSERT INTO lokasi values('','$nama','$lat','$lng','$almt')";
$hasil=mysqli_query($koneksi,$query);
if($query){
		echo "<script type='text/javascript'>window.location.replace('../?menu=home')</script>";
	}
}
?>