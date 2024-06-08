<?php
session_start();

//var_dump($_SESSION['nm_user']);
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 

$status = $_POST['status'];
$id_kurir = "";
if($status == "driver"){
	$id_kurir = ",id_kurir=0";
}
$faktur = $_POST['faktur'];

if($status == "selesai"){
	$query_tabel_keuangan = "UPDATE tabel_keuangan SET status='1' WHERE no_faktur_pembelian='$faktur'";
	$hasil_tabel_keuangan = mysqli_query($koneksi, $query_tabel_keuangan);
}

$query_tabel_pembelian = "UPDATE tabel_pembelian SET status='$status' $id_kurir WHERE no_faktur_pembelian='$faktur'";
$hasil_tabel_pembelian = mysqli_query($koneksi, $query_tabel_pembelian);
if ($hasil_tabel_pembelian) {
		echo "Berhasil Update Status Order";
} else {
    echo $hasil_tabel_pembelian;
}
