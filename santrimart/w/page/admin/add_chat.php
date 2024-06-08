<?php
session_start();
include_once '../inc/koneksi.php';


extract($_POST);
// print_r($_POST);

if (isset($_POST['idSender']) && isset($_POST['idReceiver']) && isset($_POST['chatp'])) {

    $query = "INSERT INTO `chat`(`sender_id`,`receiver_id`,`msg`,`timesend`) VALUES ('$idSender','$idReceiver','$chatp',now())";
    mysqli_query($koneksi, $query);
    // print_r($query);
} else {
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
}