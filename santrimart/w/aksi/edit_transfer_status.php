<?php
session_start();

//var_dump($_SESSION['nm_user']);
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 

$faktur = $_POST['faktur'];
$id_bukti = $_POST['id_bukti'];
$pemb = ""; $bukti = 0;
if($_POST['submit'] == "Setuju"){
	$pemb = "dikemas"; $bukti = 1;
}else if($_POST['submit'] == "Tolak"){
	$pemb = "batal"; $bukti = 2;
}
$bank = $_POST['bank'];

//update status keuangan yg topup
if($faktur == ""){
	$query_status = "UPDATE tabel_keuangan SET status=$bukti WHERE id_bukti='$id_bukti'";
	$hasil_status = mysqli_query($koneksi, $query_status);
}else{
	//update transaksi pembelian transfer bank 
	$query_status = "UPDATE tabel_pembelian SET status='$pemb' WHERE no_faktur_pembelian='$faktur'";
	$hasil_status = mysqli_query($koneksi, $query_status);
}

if($id_bukti != 0){
	//update status bukti pembayaran
	$query_status = "UPDATE tabel_bukti_pembayaran SET status=$bukti WHERE id_bukti='$id_bukti'";
	$hasil_status = mysqli_query($koneksi, $query_status);
}
//else cod


//jika dibatalkan
if($bukti == 2){
	$query_tabel_keuangan = "UPDATE tabel_keuangan SET status='2' WHERE no_faktur_pembelian='$faktur'";
	$hasil_tabel_keuangan = mysqli_query($koneksi, $query_tabel_keuangan);
}