<?php 
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 


$user_id = $_POST['user_id'];
$penerima = $_POST['penerima'];
$no_telp = $_POST['no_telp'];
$village = $_POST['village'];
$alamat = $_POST['alamat'];
$lat_pin = $_POST['lat_pin'];
$lng_pin = $_POST['lng_pin'];
$catatan = $_POST['catatan'];
$label = $_POST['label'];
$utama = $_POST['utama'];
if($utama == 1){
	$query_tabel_alamat = "UPDATE tabel_member_alamat SET status=0 WHERE user_id='$user_id'";
  mysqli_query($koneksi,$query_tabel_alamat);
}

$query = "INSERT INTO tabel_member_alamat (`user_id`, `status`, `nama_penerima`, `no_telp`, `wilayah`, `label`, `catatan`, `alamat`, `latitude`, `longitude`) values ('$user_id','$utama','$penerima','$no_telp','$village','$label','$catatan','$alamat','$lat_pin','$lng_pin')";
$hasil=mysqli_query($koneksi,$query);
if ($hasil) {
    $query = "SELECT * FROM tabel_member_alamat WHERE user_id='$user_id' and status=1";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_array($result);


		echo $data['id_alamat'];
} else {
    echo $hasil;
}

 ?>