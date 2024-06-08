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
// var_dump($_POST);
// var_dump($_FILES);
//  die;


if(isset($_POST['add_merk'])){
	$nama = strtoupper($_POST['merk']);
	if(!$nama){
		echo "<script>alert('Tambah Merk');history.back()</script>";
	}


	$query = "INSERT INTO tabel_merk_barang values('','$nama')";
	$hasil=mysqli_query($koneksi,$query);
	// echo $hasil;
	if($query){
			echo '<script>
	                setTimeout(function() {
	                    Swal.fire({
	                        icon: "success",
	                        tittle: "BERHASIL.",
	                        text: "Merk berhasil di simpan.",
	                    }).then(function() {
	                        history.back();
	                    });
	                }, 1);
	            </script>';
		}
}

 ?>