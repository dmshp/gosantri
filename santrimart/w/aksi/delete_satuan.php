<?php
session_start();

//var_dump($_SESSION['nm_user']);
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 

$id = $_GET['kd_satuan'];

$delete_tabel_satuan = "DELETE FROM tabel_satuan_barang WHERE id_satuan='$id'";
$hasil_delete_satuan = mysqli_query($koneksi, $delete_tabel_satuan);

if ($hasil_delete_satuan) {
    echo "Berhasil Hapus Satuan";
} else {
    echo $hasil_delete_satuan;
}
