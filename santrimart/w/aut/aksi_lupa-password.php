<head>
	<!-- SweetAlert -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<?php

include "../inc/koneksi.php";

function lupapassword($data)
{
    global $koneksi;

    $email = $data['email'];
    $pass = $data['pass'];
    $pass1 = $data['pass1'];

    $query = "SELECT * FROM tabel_member WHERE email_user  = '$email'";
    $hasil = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($hasil);

    $hasil_email = $data['email_user'];

    if ($hasil_email == null) {
        return 0;
    } else {
        $pengacak = "p3ng4c4k";

        $passmd = md5($pengacak . md5($pass));
        $query = "UPDATE tabel_member SET
                    password = '$passmd',
                    pass_user = '$pass1'
                WHERE email_user = '$email'";

       
        mysqli_query($koneksi, $query);

        // cek data 
        return mysqli_affected_rows($koneksi);
       
    }
}
