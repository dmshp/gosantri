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

$id_order    = $_GET['id_order'];
$id_kurir     = $_SESSION['kode_user'];
$nm_kurir     = $_SESSION['nm_user'];

// var_dump($id_order);
// var_dump($id_kurir);
// var_dump($nm_kurir);
// die;

if ($id_order != '') {

    $query = "UPDATE tabel_delivery_order SET pickup_id_kurir = null, tgl_pickup = null, pickup_nm_kurir = null, sts_batal = 1,  WHERE id = '$id_order';";
    $n = mysqli_query($koneksi, $query);

    // var_dump($n); die();
    
    if($n != null){

        echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        icon: "success",
                        tittle: "BERHASIL.",
                        text: "Delivery order berhasil dibatalkan",
                    }).then(function() {
                        window.location = "../?menu=order";
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