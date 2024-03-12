<!-- SweetAlert -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
include "../../inc/koneksi.php";
error_reporting(0);
$email 				= $_POST['email'];
$pengacak 			= "p3ng4c4k";
if ($_POST['pass'] == '') {
	$passmd 		= '';
} else {
	$passmd 		= md5($pengacak . md5($_POST['pass']));
}

if ($_POST['pass'] == '') {
	$pass 			= '';
} else {
	$pass 			= $_POST['pass'];
}

$password1 			= $_POST['pass1'];
$nama 				= $_POST['nama'];
$random 			= rand();
$alamat 			= $_POST['alamat'];
$no_tlv 			= $_POST['no_tlv'];
$bank 				= '';
$an_bank 			= '';
$norek 				= '';
$status 			= "AKTIF";
$latitude 			= $_POST['lat_member'];
$longitude 			= $_POST['lon_member'];
$kode_toko 			= null;

$cekdulu 	= "SELECT * FROM tabel_member WHERE nm_user='$nama' OR email_user='$email' OR hp='$no_tlv'"; 
$prosescek 	= mysqli_query($koneksi, $cekdulu);
if (mysqli_num_rows($prosescek)>0) { //proses mengingatkan data sudah ada
	echo '<script>
				setTimeout(function() {
					Swal.fire({
						icon: "error",
						tittle: "Pendaftaran Gagal",
						text: "Data sudah digunakan",
					}).then(function() {
						history.go(-1);
					});
				}, 1);
			</script>';
	return false;
} else {


// VALUES ('id_user','kode_user','kd_toko','tgl_daftar','nm_user','email_user','alamat_user','password','pass_user','foto','hp','akses','stt_user','on','log','bank','an_rekening','no_rekening')
$insert_1=mysqli_query($koneksi, "INSERT INTO tabel_member VALUES ('','$random','$kode_toko',NOW(),'$nama','$email','$alamat','$passmd','$pass','','$no_tlv','member','$status','','','$bank','$an_bank','$norek')");
}
?>
<script>
	setTimeout(function() {
		Swal.fire({
			icon: "success",
			tittle: "Pendaftaran Berhasil",
			text: "Silahkan login ulang dengan username yang telah didaftarkan..",
		}).then(function() {
			window.location = "../../aut/login.php";
		});
	}, 1);
</script>

