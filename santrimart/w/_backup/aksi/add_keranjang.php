<?php
session_start();
include_once '../inc/koneksi.php';

$ids = $_POST['id_user'];
$kdt = $_POST['kd_toko'];
$kdb = $_POST['kd_barang'];

// var_dump($ids); die;

if (isset($_POST['kd_toko']) && isset($_POST['id_user']) && isset($_POST['kd_barang'])) {

    $query = "INSERT INTO `keranjang`(`id_member`,`kd_barang`,`kd_toko`,`status`) VALUES ('$ids','$kdb','$kdt','keranjang')";
    $n = mysqli_query($koneksi, $query);
    
    if($n != null){
        echo "<script type='text/javascript'>alert('Transaksi dengan saldo sukses');window.location.href='../page/index.php?menu=checkout';</script>";


    }
     
    // print_r($query);
} else if ($ids != '' || $kdt !='') { 

    echo '<script>
        setTimeout(function() {
            Swal.fire({
                icon: "error",
                tittle: "Gagal ditambahkan",
                text: "Anda harus login terlebih dahulu",
            }).then(function() {
                window.location = "./w/aut/login.php";
            });
        }, 1);
    </script>';

} else {
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
}