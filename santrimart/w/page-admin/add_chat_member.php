<?php
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
}

$idSender   = $_POST['idSender'];
$idReceiver = $_POST['idReceiver'];
$pesan      = $_POST['chatp'];
$chatp      = 'Hallo kakak...
Apakah item '.$pesan.', masih ada stok?';

// var_dump($idSender);
// var_dump($idReceiver);
// var_dump($pesan);
// var_dump($chatp);
// die;

if ($idSender != '' && $idReceiver != '' && $pesan != '') {

    $query = "INSERT INTO `chat`(`sender_id`,`receiver_id`,`msg`,`timesend`) VALUES ('$idSender','$idReceiver','$chatp',now())";
    mysqli_query($koneksi, $query);
    // print_r($query);
} else {
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
}