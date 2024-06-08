<?php
session_start();

//var_dump($_SESSION['nm_user']);
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 

$id_keuangan = $_POST['id_keuangan'];
$status = $_POST['submit'];

$query_tabel_keuangan = "UPDATE tabel_keuangan SET status=$status WHERE id_keuangan='$id_keuangan'";
$hasil_tabel_keuangan = mysqli_query($koneksi, $query_tabel_keuangan);
if ($hasil_tabel_keuangan) {
		echo "Berhasil Update Status Order";
} else {
    echo $hasil_tabel_keuangan;
}
