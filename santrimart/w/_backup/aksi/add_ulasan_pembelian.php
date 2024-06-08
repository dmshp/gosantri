<?php
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
}

$nomorFaktur = $_POST['no_faktur'];
$rating      = $_POST['rating'];
$keterangan  = $_POST['keterangan'];
$nm_user     = $_SESSION['nm_user'];

// var_dump($nomorFaktur);
// var_dump($rating);
// var_dump($keterangan);
// var_dump($nm_user);
// die;
if ($nomorFaktur != '' && $rating != '' && $keterangan != '') {

    $query1 = "INSERT INTO tabel_ulasan_barang (id,no_faktur_pembelian,kd_merchant,kd_toko,kd_barang,rating,keterangan,crtdt,crtusr) 
            SELECT '' AS id, a.no_faktur_pembelian AS no_faktur_pembelian,b.kd_merchant AS kd_merchant,b.kd_toko AS kd_toko,a.kd_barang AS kd_barang,'$rating' AS rating,'$keterangan'  AS keterangan,NOW()  AS crtdt,'$nm_user'  AS crtusr
            FROM tabel_rinci_pembelian a 
            INNER JOIN tabel_barang b on a.kd_barang = b.kd_barang
            WHERE a.no_faktur_pembelian = '$nomorFaktur'";

    $query2 = "UPDATE tabel_pembelian SET status = 'selesai', pembayaran = 8 WHERE no_faktur_pembelian = '$nomorFaktur';";
    $n = mysqli_query($koneksi, $query1);
    $m = mysqli_query($koneksi, $query2);

    // var_dump($n); die();
    
    if($n != null && $m != null){
        echo "<script type='text/javascript'>alert('Ulasan berhasil di simpan');window.location.href='../page/index.php?menu=history';</script>";
    }
     
    // print_r($query);
} else {
    echo "<script>alert('Kolom Rating Dan Keterangan Ada Yang Belum diisi!');history.back()</script>";
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
}