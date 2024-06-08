<?php
session_start();

//var_dump($_SESSION['nm_user']);
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 

$id = $_GET['id'];
if (!$id) {
    echo "<script>alert('Data Kosong');history.back()</script>";
    return false;
}


$delete_tabel_pembayaran = "DELETE FROM tabel_pembayaran WHERE kd_pembayaran='$id'";

$hasil_delete_pembayaran = mysqli_query($koneksi, $delete_tabel_pembayaran);

if ($hasil_delete_pembayaran) {
		echo "Berhasil Hapus Pembayaran";
} else {
    echo $hasil_delete_pembayaran;
}
