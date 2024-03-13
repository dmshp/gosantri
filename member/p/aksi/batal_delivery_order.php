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

$id_batal    = $_POST['id_batal_order'];
$keterangan  = $_POST['keterangan_batal'];
$id_user     = $_SESSION['id_user'];
$nm_user     = $_SESSION['nm_user'];

// var_dump($id_batal);
// var_dump($keterangan);
// var_dump($id_user);
// var_dump($nm_user);
// die;

if ($id_batal != '' && $keterangan != '') {

    $query = "UPDATE tabel_delivery_order SET sts_batal =1, tgl_batal = NOW(), ket_batal= '$keterangan', id_user_batal = '$id_user', user_batal = '$nm_user' WHERE id = '$id_batal'";
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
                        window.location = "../page/?menu=delivery";
                    });
                }, 1);
            </script>';
    }
     
    // print_r($query);
} else {
    echo "<script>alert('Kolom Keterangan Batal Belum diisi!');history.back()</script>";
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
}