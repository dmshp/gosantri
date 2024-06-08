<head>
    <!-- <script src="../app-assets/js/jquery3.6.0.min.js"></script> -->
    <!-- <script src="../app-assets/js/sweetalert2@11.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<?php
error_reporting(0);
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
}


$kd_supplier = $_POST['edit_kd_suppier'];
$nama        = strtoupper($_POST['edit_nm_suppier']);
$telepon     = $_POST['edit_nomor_hp'];
$email       = strtolower($_POST['edit_email']);
$alamat      = $_POST['edit_alamat'];
$keterangan  = $_POST['edit_keterangan'];
$id_user     = $_SESSION['id_user'];
$kode_user   = $_SESSION['kode_user'];
$nm_user     = $_SESSION['nm_user'];

// var_dump($kd_supplier);
// var_dump($nama);
// var_dump($telepon);
// var_dump($email);
// var_dump($alamat);
// var_dump($keterangan);
// var_dump($id_user);
// var_dump($kode_user);
// var_dump($nm_user);
// die();

if ($kd_supplier != '' && $nama != '' && $telepon != '' && $email != '' && $alamat != '' && $keterangan != '') {

    $query = "UPDATE tabel_supplier SET nama = '$nama', alamat= '$alamat', email= '$email', telepon= '$telepon', keterangan = '$keterangan', modidt =NOW(), modiusr = '$nm_user' WHERE kd_supplier = '$kd_supplier'";

    $n = mysqli_query($koneksi, $query);

    // var_dump($n); die();
    
    if($n != null){
        echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        icon: "success",
                        tittle: "BERHASIL.",
                        text: "Data berhasil di simpan.",
                    }).then(function() {
                        window.location = "../page/index.php?menu=supplier";
                    });
                }, 1);
            </script>';
    }
        
    // print_r($query);
} else {
    echo "<script>alert('Koneksi terganngu, silahkan coba lagi!');history.back()</script>";
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
}