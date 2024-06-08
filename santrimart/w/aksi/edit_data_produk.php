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


$kd_barang      = $_POST['edit_kd_barang'];
$kd_toko        = $_POST['edit_kd_toko'];
$nm_barang      = $_POST['edit_nm_barang'];
$komisi         = $_POST['edit_komisi'];
$stok           = $_POST['edit_stok'];
$berat          = $_POST['edit_berat'];
$harga_beli     = $_POST['edit_harga_beli'];
$harga_jual     = $_POST['edit_harga_jual'];
$harga_grosir   = $_POST['edit_harga_grosir'];
$deskripsi      = $_POST['edit_deskripsi'];;
$id_user        = $_SESSION['id_user'];
$nm_user        = $_SESSION['nm_user'];

// var_dump($kd_barang);
// var_dump($kd_toko);
// var_dump($nm_barang);
// var_dump($komisi);
// var_dump($stok);
// var_dump($berat);
// var_dump($harga_beli);
// var_dump($harga_jual);
// var_dump($harga_grosir);
// var_dump($deskripsi);
// die();

if ($kd_barang != '' && $kd_toko != '' && $nm_barang != '' && $komisi != '' && $stok != '' && $berat != '' && $harga_beli != '' && $harga_jual != '' && $harga_grosir != '' && $deskripsi != '') {


    $query1 = "UPDATE tabel_barang SET nm_barang='$nm_barang', deskripsi='$deskripsi', berat='$berat', hrg_beli='$harga_beli', hrg_grosir='$harga_grosir', hrg_jual='$harga_jual', komisi='$komisi' WHERE kd_barang = '$kd_barang' AND kd_merchant = '$kd_toko';";

    $query2 = "UPDATE tabel_stok_toko SET stok = '$stok' WHERE kd_barang = '$kd_barang'";

    $m = mysqli_query($koneksi, $query1);
    $n = mysqli_query($koneksi, $query2);

    // var_dump($n); die();
    
    if($n != null){
        echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        icon: "success",
                        tittle: "BERHASIL.",
                        text: "Data Members berhasil di simpan.",
                    }).then(function() {
                        window.location = "../page/index.php?menu=daftar_produk";
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