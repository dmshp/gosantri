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
$nm_merchant 		= strtoupper($_POST['nm_merchant']);
$alamat_merchant 	= $_POST['alamat_merchant'];
$bank 				= strtoupper($_POST['nm_bank']);
$an_bank 			= $_POST['an_bank'];
$norek 				= $_POST['nomor_rekening'];
$status 			= "PENDING";
$latitude 			= $_POST['lat_merchant'];
$longitude 			= $_POST['lon_merchant'];
$kode_toko 			= rand();

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


// ---------------------------- UPLOAD GAMBAR SIUP -----------------------

$folder = "../../img/siup/";
$upload_image_siup = $_FILES['image_siup']['name'];
// tentukan ukuran width yang diharapkan
$width_size = 1024;
// tentukan di mana image akan ditempatkan setelah diupload
$filesavesiup = $folder . $upload_image_siup;
move_uploaded_file($_FILES['image_siup']['tmp_name'], $filesavesiup);
// menentukan nama image setelah dibuat
$rename_image_siup = "sim_$nama" .uniqid(rand()).".jpg";
$resize_image_siup = $folder.$rename_image_siup;
// mendapatkan ukuran width dan height dari image
list( $width, $height ) = getimagesize($filesavesiup);
// mendapatkan nilai pembagi supaya ukuran skala image yang dihasilkan sesuai dengan aslinya
$k = $width / $width_size;
// menentukan width yang baru
$newwidth = $width / $k;
// menentukan height yang baru
$newheight = $height / $k;
// fungsi untuk membuat image yang baru
$thumb = imagecreatetruecolor($newwidth, $newheight);

$source_siup = imagecreatefromjpeg($filesavesiup);
// men-resize image yang baru
imagecopyresized($thumb, $source_siup, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
// menyimpan image yang baru
imagejpeg($thumb, $resize_image_siup);
imagedestroy($thumb);
imagedestroy($source_siup);
unlink($filesavesiup);


// ---------------------------- UPLOAD LOGO TOKO -----------------------

$folder = "../../img/toko/";
$upload_image_toko = $_FILES['image_toko']['name'];
// tentukan ukuran width yang diharapkan
$width_size = 1024;
// tentukan di mana image akan ditempatkan setelah diupload
$filesavetoko = $folder . $upload_image_toko;
move_uploaded_file($_FILES['image_toko']['tmp_name'], $filesavetoko);
// menentukan nama image setelah dibuat
$rename_image_toko = "logo_$nama" .uniqid(rand()).".png";
$resize_image_toko = $folder.$rename_image_toko;
// mendapatkan ukuran width dan height dari image
list( $width, $height ) = getimagesize($filesavetoko);
// mendapatkan nilai pembagi supaya ukuran skala image yang dihasilkan sesuai dengan aslinya
$k = $width / $width_size;
// menentukan width yang baru
$newwidth = $width / $k;
// menentukan height yang baru
$newheight = $height / $k;
// fungsi untuk membuat image yang baru
$thumb = imagecreatetruecolor($newwidth, $newheight);

$source_toko = imagecreatefrompng($filesavetoko);
// men-resize image yang baru
imagecopyresized($thumb, $source_toko, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
// menyimpan image yang baru
imagepng($thumb, $resize_image_toko);
imagedestroy($thumb);
imagedestroy($source_toko);
unlink($filesavetoko);



$insert_1=mysqli_query($koneksi, "INSERT INTO tabel_member VALUES ('','$random','$kode_toko',NOW(),'$nama','$email','$alamat','$passmd','$pass','$rename_image_toko','$no_tlv','merchant','$status','','','$bank','$an_bank','$norek')");
$insert_2=mysqli_query($koneksi, "INSERT INTO tabel_merchant VALUES ('','$random','$kode_toko','$nm_merchant','$alamat_merchant','$rename_image_ktp','$rename_image_siup','$latitude','$longitude','3','',NOW())");
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

