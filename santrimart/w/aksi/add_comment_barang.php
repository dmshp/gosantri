<?php
session_start();

include '../inc/koneksi.php';

$id_barang = $_POST['idbarang'];
$nama = $_POST['nama'];
$comment = $_POST['comment'];
$date = date('Y-m-d H:i:s');

$comment = "INSERT INTO tabel_comment_barang (`id_brg`,`id_member`,`comment`,`date`) values('$id_barang','$nama','$comment','$date')";
if (mysqli_query($koneksi, $comment)) {
    echo "Terimakasih Telah Memberi Komentar";
} else {
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
}