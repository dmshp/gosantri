<?php
session_start();
include_once '../inc/koneksi.php';


extract($_POST);


if (isset($_POST['idSender']) && isset($_POST['idReceiver']) && isset($_FILES)) {

    $image_name = $_FILES['file']['name'];
    $image_tmp = $_FILES['file']['tmp_name'];


    $ekstensiGambar = explode(".", $image_name);
    $ekstensiGambar = strtolower(end($ekstensiGambar));


    $image_name_new = uniqid();
    $image_name_new .= '.';
    $image_name_new .= $ekstensiGambar;

    $dest = '../img/chat/' . $image_name_new;

    if (move_uploaded_file($image_tmp, $dest)) {
        $query = "INSERT INTO `chat`(`sender_id`,`receiver_id`,`photo`,`timesend`) VALUES ('$idSender','$idReceiver','$image_name_new',now())";
        mysqli_query($koneksi, $query);
    } else {
        print("gagal upload");
    }
} else {
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
}