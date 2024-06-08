<head>
    <!-- SweetAlert -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
    <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
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

$nm_lok_awal   = $_POST['ori_name'];
$det_lok_awal  = $_POST['origin'];
$lat_lok_awal  = $_POST['ori_latitude'];
$lng_lok_awal  = $_POST['ori_longitude'];
$nm_lok_akhir  = $_POST['des_name'];
$det_lok_akhir = $_POST['destination'];
$lat_lok_akhir = $_POST['des_latitude'];
$lng_lok_akhir = $_POST['des_longitude'];
$hitung_jarak  = $_POST['jarak'];
$hitung_durasi = $_POST['durasi'];
$rupiah        = $_POST['tot_rupiah'];
$pembayaran    = $_POST['jns_pembayaran'];
$keterangan    = $_POST['keterangan'];
$id_user       = $_SESSION['id_user'];
$nm_user       = $_SESSION['nm_user'];

if ($_POST['travel_mode'] == 'DRIVING') {
    $kendaraan  = 'Mobil';
} else if ($_POST['travel_mode'] == 'WALKING') {
    $kendaraan  = 'Motor';
}

// var_dump($nm_lok_awal);
// var_dump($det_lok_awal);
// var_dump($lat_lok_awal);
// var_dump($lng_lok_awal);
// var_dump($nm_lok_akhir);
// var_dump($det_lok_akhir);
// var_dump($lat_lok_akhir);
// var_dump($lng_lok_akhir);
// var_dump($hitung_jarak);
// var_dump($hitung_durasi);
// var_dump($rupiah);
// var_dump($pembayaran);
// var_dump($keterangan);
// var_dump($kendaraan);
// var_dump($nm_user);
// die();

if ($nm_lok_awal != '' && $det_lok_awal != '' && $lat_lok_awal != '' && $lng_lok_awal != '' && $nm_lok_akhir != '' && $det_lok_akhir != '' && $lat_lok_akhir != '' && $lng_lok_akhir != '' && $hitung_jarak != '' && $hitung_durasi != '' && $rupiah != '' && $pembayaran != '' && $keterangan != '' && $kendaraan != '') {

    $query = "INSERT INTO tabel_delivery_order (id,nm_lokasi_awal,det_lokasi_awal,lat_lokasi_awal,lng_lokasi_awal,nm_lokasi_akhir,det_lokasi_akhir,lat_lokasi_akhir,lng_lokasi_akhir,jarak_lokasi,durasi_perjalanan,rupiah,jenis_pembayaran,kendaraan,keterangan,tgl_order,id_user,nm_member,pickup_id_kurir,tgl_pickup,pickup_nm_kurir,selesai,konfirm_selesai,sts_batal,tgl_batal,ket_batal,id_user_batal,user_batal) 
        VALUES ( '','$nm_lok_awal','$det_lok_awal','$lat_lok_awal','$lng_lok_awal','$nm_lok_akhir','$det_lok_akhir','$lat_lok_akhir','$lng_lok_akhir','$hitung_jarak','$hitung_durasi','$rupiah','$pembayaran','$kendaraan','$keterangan',NOW(),'$id_user','$nm_user',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL)";

    $n = mysqli_query($koneksi, $query);

    // var_dump($n); die();
    
    if($n != null){
        echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        icon: "success",
                        tittle: "BERHASIL.",
                        text: "Delivery order berhasil di simpan, dimohon menunggu Driver melakukan konfirmasi.",
                    }).then(function() {
                        window.location = "../page/index.php?menu=delivery_member";
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