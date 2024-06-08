<?php
session_start();
include_once '../inc/koneksi.php';

$ids = $_POST['id_user'];
$kdb = $_POST['kd_barang'];

if (isset($_POST['id_user']) && isset($_POST['kd_barang'])) {
    $query_delete = "DELETE FROM `keranjang` WHERE `id_member` = '$ids' AND `kd_barang`= '$kdb'";
    $success_delete = mysqli_query($koneksi, $query_delete);
    if ($success_delete != null) {
        echo "<script type='text/javascript'>alert('hapus sukses');window.location.href='../page/index.php?menu=checkout';</script>";
    }
} else {
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
}