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
$sepeda_motor 		= $_POST['sepeda_motor'];
$sepeda_motor_tahun	= $_POST['sepeda_motor_tahun'];
$nomor_polisi 		= strtoupper($_POST['nomor_polisi']);
$bank 				= strtoupper($_POST['nm_bank']);
$an_bank 			= $_POST['an_bank'];
$norek 				= $_POST['nomor_rekening'];
$status 			= "PENDING";
$latitude 			= $_POST['lat_kurir'];
$longitude 			= $_POST['lon_kurir'];
$lat_long 			= $latitude .','.$longitude;
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


// ---------------------------- UPLOAD GAMBAR KTP -----------------------

$folder = "../../img/ktp/";
$upload_image_ktp = $_FILES['image_ktp']['name'];
// tentukan ukuran width yang diharapkan
$width_size = 1024;
// tentukan di mana image akan ditempatkan setelah diupload
$filesavektp = $folder . $upload_image_ktp;
move_uploaded_file($_FILES['image_ktp']['tmp_name'], $filesavektp);
// menentukan nama image setelah dibuat
$rename_image_ktp = "ktp_$nama" .uniqid(rand()).".jpg";
$resize_image_ktp = $folder.$rename_image_ktp;
// mendapatkan ukuran width dan height dari image
list( $width, $height ) = getimagesize($filesavektp);
// mendapatkan nilai pembagi supaya ukuran skala image yang dihasilkan sesuai dengan aslinya
$k = $width / $width_size;
// menentukan width yang baru
$newwidth = $width / $k;
// menentukan height yang baru
$newheight = $height / $k;
// fungsi untuk membuat image yang baru
$thumb = imagecreatetruecolor($newwidth, $newheight);

$source_ktp = imagecreatefromjpeg($filesavektp);
// men-resize image yang baru
imagecopyresized($thumb, $source_ktp, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
// menyimpan image yang baru
imagejpeg($thumb, $resize_image_ktp);
imagedestroy($thumb);
imagedestroy($source_ktp);
unlink($filesavektp);


// ---------------------------- UPLOAD GAMBAR SIM -----------------------

$folder = "../../img/sim/";
$upload_image_sim = $_FILES['image_sim']['name'];
// tentukan ukuran width yang diharapkan
$width_size = 1024;
// tentukan di mana image akan ditempatkan setelah diupload
$filesavesim = $folder . $upload_image_sim;
move_uploaded_file($_FILES['image_sim']['tmp_name'], $filesavesim);
// menentukan nama image setelah dibuat
$rename_image_sim = "sim_$nama" .uniqid(rand()).".jpg";
$resize_image_sim = $folder.$rename_image_sim;
// mendapatkan ukuran width dan height dari image
list( $width, $height ) = getimagesize($filesavesim);
// mendapatkan nilai pembagi supaya ukuran skala image yang dihasilkan sesuai dengan aslinya
$k = $width / $width_size;
// menentukan width yang baru
$newwidth = $width / $k;
// menentukan height yang baru
$newheight = $height / $k;
// fungsi untuk membuat image yang baru
$thumb = imagecreatetruecolor($newwidth, $newheight);

$source_sim = imagecreatefromjpeg($filesavesim);
// men-resize image yang baru
imagecopyresized($thumb, $source_sim, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
// menyimpan image yang baru
imagejpeg($thumb, $resize_image_sim);
imagedestroy($thumb);
imagedestroy($source_sim);
unlink($filesavesim);

$insert_1=mysqli_query($koneksi, "INSERT INTO tabel_member VALUES ('','$random','$kode_toko',NOW(),'$nama','$email','$alamat','$passmd','$pass','','$no_tlv','kurir','$status','','','$bank','$an_bank','$norek')");
$insert_2=mysqli_query($koneksi, "INSERT INTO tabel_kurir VALUES ('','$random','$nomor_polisi','$sepeda_motor','$sepeda_motor_tahun','$rename_image_ktp','$rename_image_sim','$lat_long','',NOW())");
}
?>
<script>
	setTimeout(function() {
		Swal.fire({
			icon: "success",
			tittle: "Pendaftaran Berhasil",
			text: "Data sedang di verifikasi Admin, Mohon sabar menunggu...",
		}).then(function() {
			window.location = "../../aut/login.php";
		});
	}, 1);
</script>

