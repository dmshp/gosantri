<!-- SweetAlert -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
include('../inc/koneksi.php');
error_reporting(0);
$email = $_POST['email'];
$pass = $_POST['pass'];
$password1 = $_POST['pass1'];
$nama = $_POST['nama'];
$random = rand();
$alamat = $_POST['alamat'];
$no_tlv = $_POST['no_tlv'];
$sepeda_motor = $_POST['sepeda_motor'];
$sepeda_motor_tahun= $_POST['sepeda_motor_tahun'];
$nomor_polisi= $_POST['nomor_polisi'];
$passmd = md5($pengacak . md5($pass));
$status = "PENDING";

$cekdulu= "SELECT * FROM tabel_member WHERE nm_user='$nama' OR email_user='$email' OR hp='$no_tlv'"; 
$prosescek= mysqli_query($koneksi, $cekdulu);
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

$folder = "../img/ktp/";
$upload_image = $_FILES['image']['name'];
// tentukan ukuran width yang diharapkan
$width_size = 720;
// tentukan di mana image akan ditempatkan setelah diupload
$filesave = $folder . $upload_image;
move_uploaded_file($_FILES['image']['tmp_name'], $filesave);
// menentukan nama image setelah dibuat
$rename_image = "ktp_$nama" .uniqid(rand()).".jpg";
$resize_image = $folder.$rename_image;
// mendapatkan ukuran width dan height dari image
list( $width, $height ) = getimagesize($filesave);
// mendapatkan nilai pembagi supaya ukuran skala image yang dihasilkan sesuai dengan aslinya
$k = $width / $width_size;
// menentukan width yang baru
$newwidth = $width / $k;
// menentukan height yang baru
$newheight = $height / $k;
// fungsi untuk membuat image yang baru
$thumb = imagecreatetruecolor($newwidth, $newheight);

$source = imagecreatefromjpeg($filesave);
// men-resize image yang baru
imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
// menyimpan image yang baru
imagejpeg($thumb, $resize_image);
imagedestroy($thumb);
imagedestroy($source);
unlink($filesave);

$insert_1=mysqli_query($koneksi, "INSERT INTO tabel_member VALUES ('','$random','',NOW(),'$nama','$email','$passmd','$password1','','$no_tlv','kurir','$status','','','','','')");
$insert_2=mysqli_query($koneksi, "INSERT INTO tabel_kurir VALUES ('','$random','$nomor_polisi','$sepeda_motor','$sepeda_motor_tahun','$rename_image','','','',NOW())");
}
?>
<script>
	setTimeout(function() {
		Swal.fire({
			icon: "success",
			tittle: "Pendaftaran Berhasil",
			text: "Data sedang di verifikasi",
		}).then(function() {
			window.location = "../index.php";
		});
	}, 1);
</script>

