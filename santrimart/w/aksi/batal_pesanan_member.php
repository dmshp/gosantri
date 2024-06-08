<head>
    <!-- SweetAlert -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
    <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <script src="../app-assets/js/jquery3.6.0.min.js"></script>
    <script src="../app-assets/js/sweetalert2@11.js"></script>
</head>

<?php
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
}

$nomorFaktur = $_POST['no_faktur_batal'];
$keterangan  = $_POST['keterangan_batal'];
$nm_user     = $_SESSION['nm_user'];
$status      = 'batal';
$pembayaran  = 9;

// var_dump($nomorFaktur);
// var_dump($keterangan);
// var_dump($nm_user);
// var_dump($status);
// var_dump($pembayaran);
// die;

if ($nomorFaktur != '' && $keterangan != '') {

    $query1 = "INSERT INTO tabel_log_transaksi (id,no_faktur_pembelian,status,pembayaran,keterangan,crtdt,crtusr) VALUES ('','$nomorFaktur','$status','$pembayaran','$keterangan',NOW(),'$nm_user')";
    $query2 = "UPDATE tabel_pembelian SET status = '$status', pembayaran = '$pembayaran' WHERE no_faktur_pembelian = '$nomorFaktur';";
    $n = mysqli_query($koneksi, $query1);
    $m = mysqli_query($koneksi, $query2);
    
    if($n != null && $m != null){
        echo "<script type='text/javascript'>alert('Pesanan Berhasil dibatalkan');window.location.href='../page/index.php?menu=history';</script>";
    }
     
    // print_r($query);
} else {
    echo "<script>alert('Kolom Keterangan Batal Belum diisi!');history.back()</script>";
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
}