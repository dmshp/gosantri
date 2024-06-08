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


$delete_tabel_alamat = "DELETE FROM tabel_member_alamat WHERE id_alamat='$id'";

$hasil_delete_alamat = mysqli_query($koneksi, $delete_tabel_alamat);

if ($hasil_delete_alamat) {
		echo "Berhasil Hapus Alamat";
} else {
    echo $hasil_delete_alamat;
}
