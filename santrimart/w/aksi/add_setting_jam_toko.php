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

$kode_user = $_SESSION['kode_user'];
$nm_user   = $_SESSION['nm_user'];

// var_dump($kode_user);
// var_dump($nm_user);
// die;

if ($kode_user != '' && $nm_user != '') {

    $query = "INSERT INTO tabel_setting_toko (id_setting,id_user,hari,jam_awal,jam_akhir,aktif,crtdt,crtusr,modidt,modiusr) VALUES 
   ('','$kode_user',1,'00:00','00:00',0,now(),'$nm_user','',''),
   ('','$kode_user',2,'00:00','00:00',0,now(),'$nm_user','',''),
   ('','$kode_user',3,'00:00','00:00',0,now(),'$nm_user','',''),
   ('','$kode_user',4,'00:00','00:00',0,now(),'$nm_user','',''),
   ('','$kode_user',5,'00:00','00:00',0,now(),'$nm_user','',''),
   ('','$kode_user',6,'06:00','18:00',0,now(),'$nm_user','',''),
   ('','$kode_user',7,'08:00','17:00',0,now(),'$nm_user','','');";

    $n = mysqli_query($koneksi, $query);

    // var_dump($n); die();
    
    if($n != null){

        echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        icon: "success",
                        tittle: "BERHASIL.",
                        text: "Jam Operasional Toko berhasil ditambahkan",
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