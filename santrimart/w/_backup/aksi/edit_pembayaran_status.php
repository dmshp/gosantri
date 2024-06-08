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

$query_tabel_pembayaran = "UPDATE tabel_pembayaran SET status=!status WHERE kd_pembayaran='$id'";
$hasil_tabel_pembayaran = mysqli_query($koneksi, $query_tabel_pembayaran);
if ($hasil_tabel_pembayaran) {
		echo "Berhasil Update Status Pembayaran";
} else {
    echo $hasil_tabel_pembayaran;
}
