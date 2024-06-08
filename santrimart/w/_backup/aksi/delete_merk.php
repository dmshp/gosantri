<?php
session_start();

//var_dump($_SESSION['nm_user']);
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 

$id = $_GET['kd_merk'];

$delete_tabel_merk = "DELETE FROM tabel_merk_barang WHERE id_merk='$id'";
$hasil_delete_merk = mysqli_query($koneksi, $delete_tabel_merk);

if ($hasil_delete_merk) {
    echo "Berhasil Hapus Merk";
} else {
    echo $hasil_delete_merk;
}
