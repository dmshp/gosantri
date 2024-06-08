<?php 
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 


$id_hidden = $_POST['id_hidden'];
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

$query = "UPDATE tabel_member_alamat SET status='$utama',nama_penerima='$penerima',no_telp='$no_telp',wilayah='$village',label='$label',catatan='$catatan',alamat='$alamat',latitude='$lat_pin',longitude='$lng_pin' WHERE id_alamat='$id_hidden'";
$hasil=mysqli_query($koneksi,$query);
if ($hasil) {
		echo "Berhasil Ubah Alamat";
} else {
    echo $hasil;
}

 ?>