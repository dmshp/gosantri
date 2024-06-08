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


$nama        = strtoupper($_POST['add_nm_suppier']);
$telepon     = $_POST['add_nomor_hp'];
$email       = strtolower($_POST['add_email']);
$alamat      = $_POST['add_alamat'];
$keterangan  = $_POST['add_keterangan'];
$id_user     = $_SESSION['id_user'];
$kode_user   = $_SESSION['kode_user'];
$nm_user     = $_SESSION['nm_user'];
$random      = rand();
$bulan       = date("m");
$kd_supplier = 'SUPP'.$bulan.'00'.substr($random,0,3);

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

if ($nama != '' && $telepon != '' && $email != '' && $alamat != '' && $keterangan != '') {


    $sql = mysqli_query($koneksi, "SELECT * FROM tabel_supplier WHERE nama = '$nama' OR email = '$email' OR telepon = '$telepon' OR alamat = '$alamat'");
    $jml_supplier = mysqli_num_rows($sql);

    if ($jml_supplier>0) {
        echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        icon: "error",
                        tittle: "GAGAL SIMPAN",
                        text: "Data Sudah Ada!!",
                    }).then(function() {
                        history.back();
                    });
                }, 1);
            </script>';
    } else {

        $query = "INSERT INTO tabel_supplier (kd_supplier,tgl_masuk,nama,alamat,email,telepon,aktif,keterangan,crtdt,crtusr) VALUES ('$kd_supplier',NOW(),'$nama','$alamat','$email','$telepon',1,'$keterangan',NOW(),'$nm_user')";

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

    } 
    // print_r($query);
} else {
    echo "<script>alert('Koneksi terganngu, silahkan coba lagi!');history.back()</script>";
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
}