<?php
session_start();

//var_dump($_SESSION['nm_user']);
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 

$id = $_GET['id'];
if (!$id) {
		echo "<script>alert('ID kosong');history.back()</script>";
		return false;
}

$user_id = $_GET['user_id'];
$query_tabel_alamat = "UPDATE tabel_member_alamat SET status=0 WHERE user_id='$user_id'";
$hasil_tabel_alamat = mysqli_query($koneksi, $query_tabel_alamat);
$query_tabel_alamat = "UPDATE tabel_member_alamat SET status=1 WHERE id_alamat='$id'";
$hasil_tabel_alamat = mysqli_query($koneksi, $query_tabel_alamat);
if ($hasil_tabel_alamat) {
		echo "Berhasil Jadikan Alamat Utama";
} else {
    echo $hasil_tabel_alamat;
}
