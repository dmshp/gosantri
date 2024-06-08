<head>
    <script src="../app-assets/js/jquery3.6.0.min.js"></script>
    <script src="../app-assets/js/sweetalert2@11.js"></script>
</head>

<?php
error_reporting(0);
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
}

$id_link    = $_GET['id_link'];
$kd_barang  = $_GET['kd_barang'];
$nm_barang  = $_GET['nm_barang'];
$komisi     = $_GET['komisi'];
$id_user    = $_SESSION['id_user'];
$kode_user  = $_SESSION['kode_user'];
$nm_user    = $_SESSION['nm_user'];
$link       = "https://santrimart.co.id/w/detail_produk.php?kd_barang=".$kd_barang;

// var_dump($id_link);
// var_dump($kd_barang);
// var_dump($nm_barang);
// var_dump($komisi);
// var_dump($id_user);
// var_dump($kode_user);
// var_dump($nm_user);
// die();

if ($id_link != '' && $kd_barang != '' && $nm_barang != '' && $komisi != '') {

    $text = "";
    $query = "UPDATE tabel_link_produk SET kode_user='$kode_user', kd_barang='$kd_barang', nm_barang='$nm_barang', komisi='$komisi', link='$link', modidt=now(), modiusr='$nm_user' WHERE id_link = '$id_link';";

    $n = mysqli_query($koneksi, $query);

    // var_dump($n); die();
    
    if($n != null){
        $text = "Link Berhasil Di Simpan";
    }
    else{
        $text = "Link Gagal Di Simpan";
    }
     
    // print_r($query);
} else {
    echo "<script>alert('Koneksi terganngu, silahkan coba lagi!');history.back()</script>";
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
}