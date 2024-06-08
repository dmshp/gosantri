<?php
session_start();

include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 

$nominal = $_POST['nominal'];
if($nominal < 50000){
	echo "Minimal penarikan 50.000";
	exit();
}
$id_user = $_SESSION['id_user'];
$kurir = mysqli_fetch_array(mysqli_query($koneksi, "SELECT SUM(CASE WHEN arus=0 and status=1 THEN `nominal` END) as saldo, SUM(CASE WHEN (arus=1 and status=1) or (arus=1 and status=0 and no_faktur_pembelian='') THEN `nominal` END) as wd FROM `tabel_keuangan` WHERE `id_member`=$id_user"));
$saldo = $kurir['saldo'] - $kurir['wd'];
if($nominal > $saldo){
	echo "Nominal penarikan melebihi saldo";
	exit();
}

$query_keuangan = "INSERT INTO `tabel_keuangan` (`id_member`, `tanggal`, `nominal`, `arus`, `no_faktur_pembelian`, `status`) VALUES ('$id_user',NOW(),'$nominal',1,'',0)";
mysqli_query($koneksi, $query_keuangan);
echo 1;