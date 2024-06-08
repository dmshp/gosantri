<?php
session_start();
include_once '../inc/koneksi.php';

$id_user = $_SESSION['id_user'];

$ketQuery = "SELECT COUNT(tc.id) as total FROM chat tc
		WHERE tc.receiver_id = '$id_user' AND tc.status='unread'";
$executeSat = mysqli_query($koneksi, $ketQuery);
$a = mysqli_fetch_array($executeSat);
echo $a['total']
?>