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

$id_setting = $_POST['edit_id'];
$jam_awal   = $_POST['edit_jam_awal'];
$jam_akhir  = $_POST['edit_jam_akhir'];
$nm_user    = $_SESSION['nm_user'];

// var_dump($id_setting);
// var_dump($jam_awal);
// var_dump($jam_akhir);
// var_dump($nm_user);
// die;

if ($id_setting != '' && $jam_awal != '' && $jam_akhir != '') {

    $query = "UPDATE `tabel_setting_toko` SET jam_awal = '$jam_awal', jam_akhir = '$jam_akhir', modidt = now(), modiusr = '$nm_user' WHERE `id_setting` = '$id_setting'";

    $n = mysqli_query($koneksi, $query);

    // var_dump($n); die();
    
    if($n != null){

        echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        icon: "success",
                        tittle: "BERHASIL.",
                        text: "Jam Operasional Toko berhasil diubah",
                    }).then(function() {
                        window.location = "../page/index.php?menu=profile";
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