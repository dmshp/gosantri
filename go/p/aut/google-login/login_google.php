<head>
	<!-- SweetAlert -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<?php

session_start();
include "../../inc/koneksi.php";


$email = $_SESSION['info']['email'];
$query = "SELECT * FROM tabel_member WHERE email_user  = '$email'";
$hasil = mysqli_query($koneksi,$query);
$data = mysqli_fetch_assoc($hasil);

$hasil_email = isset($data['email_user']) ? $data['email_user'] : '';
// var_dump($hasil_email);

if ($hasil_email == null) {
//    echo "<script>alert('Login Berhasil Silahkan Lengkapi Data!');window.location= 'daftar_google.php';</script>";
   echo '<script>
            setTimeout(function() {
                Swal.fire({
                    icon: "success",
                    tittle: "Berhasil Login",
                    text: "Login Berhasil Silahkan Lengkapi Data!",
                }).then(function() {
                    window.location = "daftar_google.php";
                });
            }, 1);
        </script>';

} else {

    $id						= $data['id_user'];
    $_SESSION['nm_user']	= $data['nm_user'];
    $_SESSION['id_user']	= $data['id_user'];
    $_SESSION['email_user']	= $data['email_user'];
    $_SESSION['akses']		= $data['akses'];
    $_SESSION['kd_toko']	= $data['kd_toko'];
    $update					= mysqli_query($koneksi, "UPDATE `tabel_member` SET `log` = now() WHERE `id_user` = '$id'");

    // echo "<script>alert('Berhasil Login');window.location= '../../page/?menu=home';</script>";
    echo '<script>
            setTimeout(function() {
                Swal.fire({
                    icon: "success",
                    tittle: "Berhasil Login",
                    text: "Berhasil Login",
                }).then(function() {
                    window.location = "../../page/?menu=home";
                });
            }, 1);
        </script>';
    
}


?>