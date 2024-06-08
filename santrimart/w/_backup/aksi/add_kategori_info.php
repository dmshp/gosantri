<?php
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 

if (isset($_POST['add_kategori'])) {
    $nama = $_POST['kategori'];
    if (!$nama) {
        echo "<script>alert('Tambah Nama Kategori');history.back()</script>";
    }

    // var_dump($nama);
    // die;

    $query = "INSERT INTO tabel_kategori_info values('','$nama')";
    $hasil = mysqli_query($koneksi, $query);
    echo $hasil;
    if ($hasil) {
        echo "<script type='text/javascript'>alert('Berhasil Tambah Kategori');history.back()</script>";
    }
}
