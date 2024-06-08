<head>
    <!-- <script src="../app-assets/js/jquery3.6.0.min.js"></script> -->
    <!-- <script src="../app-assets/js/sweetalert2@11.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<?php 
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 
// var_dump($_POST);
// die;
$jml_stok = '';

$faktur 	= $_POST['retur_faktur'];
$kd_barang 	= $_POST['retur_kd_barang'];
$jml 		= $_POST['retur_jumlah'];
$ket 		= $_POST['retur_keterangan'];
$status 	= $_POST['retur_status'];
$id_user    = $_SESSION['id_user'];
$kode_user  = $_SESSION['kode_user'];
$nm_user    = $_SESSION['nm_user'];
$tgl_retur 	= date('Y-m-d H:i:s');

// var_dump($faktur);
// var_dump($kd_barang);
// var_dump($jml);
// var_dump($ket);
// var_dump($status);
// var_dump($id_user);
// var_dump($kode_user);
// var_dump($nm_user);
// var_dump($tgl_retur);
// die();

if ($faktur != '' && $kd_barang != '' && $jml != '' && $ket != '' && $status != '') {

	$stok = 0;
	$sql = mysqli_query($koneksi, "SELECT * FROM tabel_stok_toko WHERE kd_barang = '$kd_barang'");
  while ($k = mysqli_fetch_array($sql)) {
		$stok = $k['stok'];  	
  }

  if ($status == 'Nota Penjualan') {
        
        if ($stok == 0) {
            $jml_stok = $jml;
        } else {
            $jml_stok = $stok + $jml;
        }

  } else if ($status == 'Nota Pembelian') {

        if ($stok == 0) {
            $jml_stok = $jml;
        } else {
            $jml_stok = $stok - $jml;
        }

  }

  // var_dump($jml_stok);
	// die();

	$query = "INSERT INTO tabel_retur (no_faktur_retur,kd_barang,tgl_retur,id_user,total_retur,ket,status,crtdt,crtusr) VALUES ('$faktur','$kd_barang','$tgl_retur','$id_user','$jml_stok','$ket','$status',now(),'$nm_user')";
	
	$n = mysqli_query($koneksi,$query);
	$m = mysqli_query($koneksi, "UPDATE tabel_stok_toko SET stok = '$jml_stok' WHERE kd_barang = '$kd_barang'");

	if($n != null){

        if ($status == 'Nota Penjualan') {
              
            echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        icon: "success",
                        tittle: "BERHASIL.",
                        text: "Nota berhasil di retur.",
                    }).then(function() {
                        history.back();
                        window.location = "../page/index.php?menu=retur_jual";
                    });
                }, 1);
            </script>';

        } else if ($status == 'Nota Pembelian') {

            echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        icon: "success",
                        tittle: "BERHASIL.",
                        text: "Nota berhasil di retur.",
                    }).then(function() {
                        history.back();
                        window.location = "../page/index.php?menu=retur_beli";
                    });
                }, 1);
            </script>';
            
        }
    }

} else {
    echo "<script>alert('Koneksi terganngu, silahkan coba lagi!');history.back()</script>";
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
}

 ?>