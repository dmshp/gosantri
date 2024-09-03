<?php
session_start();
include_once '../inc/koneksi.php';


extract($_POST);
// print_r($_POST);

if (isset($_POST['idSender']) && isset($_POST['idReceiver']) && isset($_POST['chatp'])) {
    $idSender = $_POST["idSender"];
    $idReceiver = $_POST["idReceiver"];
    $chatp = $_POST["chatp"];
    $query = "INSERT INTO `chat`(`sender_id`,`receiver_id`,`msg`,`timesend`) VALUES ('$idSender','$idReceiver','$chatp',now())";
    mysqli_query($koneksi, $query);
    echo "<script>history.back()</script>";
} else {
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($koneksi);
}
