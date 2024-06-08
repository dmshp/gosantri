<head>
    <script src="../app-assets/js/jquery3.6.0.min.js"></script>
    <script src="../app-assets/js/sweetalert2@11.js"></script>
</head>

<?php
error_reporting(0);
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
}

$kd_barang  = $_GET['kd_barang'];
$nm_barang  = $_GET['nm_barang'];
$komisi     = $_GET['komisi'];
$id_user    = $_SESSION['id_user'];
$kode_user  = $_SESSION['kode_user'];
$nm_user    = $_SESSION['nm_user'];
$link       = "https://santrimart.co.id/w/detail_produk.php?kd_barang=".$kd_barang;

// var_dump($kd_barang);
// var_dump($nm_barang);
// var_dump($komisi);
// var_dump($id_user);
// var_dump($kode_user);
// var_dump($nm_user);
// die();

if ($kd_barang != '' && $nm_barang != '' && $komisi != '') {

    $query = "INSERT INTO tabel_link_produk (kode_user,kd_barang,nm_barang,komisi,link,aktif,crtdt,crtusr) VALUES 
            ('$kode_user','$kd_barang','$nm_barang','$komisi','$link',1,now(),'$nm_user')";

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
                        window.location = "../page/index.php?menu=produk_link";
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