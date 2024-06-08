<?php
session_start();

//var_dump($_SESSION['nm_user']);
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 

$id = $_GET['kd_kategori'];

$delete_tabel_kategori = "DELETE FROM tabel_kategori_barang WHERE kd_kategori='$id'";
$hasil_delete_kategori = mysqli_query($koneksi, $delete_tabel_kategori);

if ($hasil_delete_kategori) {
    echo "Berhasil Hapus Kategori";
} else {
    echo $hasil_delete_kategori;
}
