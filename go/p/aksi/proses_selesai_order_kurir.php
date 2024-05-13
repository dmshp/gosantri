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

$id_order     = $_GET['id_order'];
$pembayaran   = $_GET['jenis_pembayaran'];
$id_member    = $_GET['id_member'];
$rupiah       = $_GET['rupiah'];
$id_kurir     = $_SESSION['id_user'];
$kode_user     = $_SESSION['kode_user'];
$nm_kurir     = $_SESSION['nm_user'];

// var_dump($id_order);
// var_dump($pembayaran);
// var_dump($id_member);
// var_dump($rupiah);
// var_dump($id_kurir);
// var_dump($kode_user);
// var_dump($nm_kurir);
// die;

if ($id_order != '' && $pembayaran != '' && $id_member != '' && $rupiah != '') {

    if ($pembayaran == 'SALDO') {

        $ket_saldo = 'Deliveri Order dengan id transaksi ['.$id_order.']';

        // Menambahkan pengeluaran saldo member
        $query_saldo_member = "INSERT INTO tabel_saldo (id_saldo,id_user,tanggal,jumlah,pengeluaran,ket_saldo) VALUES ('','$id_member',NOW(),'0','$rupiah','$ket_saldo')";
        $a = mysqli_query($koneksi, $query_saldo_member);

        // Menambahkan jumlah saldo kurir
        $query_saldo_kurir = "INSERT INTO tabel_saldo (id_saldo,id_user,tanggal,jumlah,pengeluaran,ket_saldo) VALUES ('','$id_kurir',NOW(),'$rupiah','0','$ket_saldo')";
        $b = mysqli_query($koneksi, $query_saldo_kurir);
        
        $query = "UPDATE tabel_delivery_order SET konfirm_selesai = 'Y' WHERE id = '$id_order';";
        $n = mysqli_query($koneksi, $query);

        // var_dump($n); die();
        
        if($a != null && $b != null && $n != null){

            echo '<script>
                    setTimeout(function() {
                        Swal.fire({
                            icon: "success",
                            tittle: "BERHASIL.",
                            text: "Proses Delivery order telah selesai",
                        }).then(function() {
                            window.location = "../page/index.php?menu=delivery";
                        });
                    }, 1);
                </script>';
        }

    } else if ($pembayaran == 'CASH') {
        
        $query = "UPDATE tabel_delivery_order SET konfirm_selesai = 'Y' WHERE id = '$id_order';";
        $n = mysqli_query($koneksi, $query);

        // var_dump($n); die();
        
        if($n != null){

            echo '<script>
                    setTimeout(function() {
                        Swal.fire({
                            icon: "success",
                            tittle: "BERHASIL.",
                            text: "Proses Delivery order telah selesai",
                        }).then(function() {
                            window.location = "../page/index.php?menu=delivery";
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