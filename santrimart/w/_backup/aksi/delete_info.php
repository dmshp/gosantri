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


$delete_tabel_info = "DELETE FROM tabel_info WHERE id_info='$id'";
$delete_tabel_info_gambar = "DELETE FROM tabel_info_gambar WHERE id_info='$id'";

$hasil_delete_info = mysqli_query($koneksi, $delete_tabel_info);
$hasil_delete_gambar = mysqli_query($koneksi, $delete_tabel_info_gambar);

if ($hasil_delete_info) {
    if ($hasil_delete_gambar) {
        echo "Berhasil Hapus Info";
    } else {
        echo $hasil_delete_gambar;
    }
} else {
    echo $hasil_delete_info;
}
