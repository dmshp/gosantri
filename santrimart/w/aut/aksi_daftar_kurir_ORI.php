<!-- SweetAlert -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!--?php

use FontLib\Header;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include('../../phpmailer/src/Exception.php');
include('../../phpmailer/src/PHPMailer.php');
include('../../phpmailer/src/SMTp.php');
?-->

<?php
include "../inc/koneksi.php";

$email = $_POST['email'];
$pass = $_POST['pass'];
$password1 = $_POST['pass1'];
$nama = $_POST['nama'];
$random = rand();
$alamat = $_POST['alamat'];
$no_tlv = $_POST['no_tlv'];

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
}
	//proses menambahkan data, tambahkan sesuai dengan yang kalian gunakan
	// requirment
if(!isset($_POST['validasi'])){	
	echo '<script>
				setTimeout(function() {
					Swal.fire({
						icon: "error",
						tittle: "Validasi",
						text: "Persetujuan",
					}).then(function() {
						history.back();
					});
				}, 1);
			</script>';
	return false;
}

if (isset($_FILES)) {
	// upload image
	$image_name = $_FILES['image']['name'];
	$image_size = $_FILES['image']['size'];
	$image_tmp = $_FILES['image']['tmp_name'];
	$image_error = $_FILES['image']['error'];

	// cek ekstensi
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode(".", $image_name);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {		
		echo '<script>
				setTimeout(function() {
					Swal.fire({
						icon: "error",
						tittle: "Ekstensi File",
						text: "Hanya Menerima ekstensi jpg, jpeg dan png",
					}).then(function() {
						history.back();
					});
				}, 1);
			</script>';
		return false;
	}else if ($image_size > 1000000) { // cek ukuran		
		echo '<script>
				setTimeout(function() {
					Swal.fire({
						icon: "error",
						tittle: "Ukuran File",
						text: "Ukuran Image Harus < 1 Mb",
					}).then(function() {
						history.back();
					});
				}, 1);
			</script>';
		return false;
	}
} else {
	
	echo '<script>
				setTimeout(function() {
					Swal.fire({
						icon: "error",
						tittle: "File KTP",
						text: "Upload ktp harus diisi",
					}).then(function() {
						history.back();
					});
				}, 1);
			</script>';
	return false;
}

$query = "";

if($pass == $password1){
	$pengacak= "p3ng4c4k";	
	$passmd = md5($pengacak . md5($pass));
	$status = "PENDING";
	$query = "INSERT INTO `tabel_member`
				(`kode_user`, `tgl_daftar`, `nm_user`, `email_user`,`alamat_user`, `password`,`pass_user`,`hp`,`akses`,`stt_user`) 
			VALUES 
				('$random',NOW(), '$nama', '$email','$alamat','$passmd','$password1','$no_tlv','kurir','$status')";
	
	$hasil = mysqli_query($koneksi,$query);

	if ($hasil) {
		$executeQue = mysqli_query($koneksi, "SELECT LAST_INSERT_ID() as id");
		$g = mysqli_fetch_array($executeQue);
		$id_user = $g['id'];

		$nomor_polisi = $_POST["nomor_polisi"];
		$sepeda_motor = $_POST["sepeda_motor"];
		$sepeda_motor_tahun = $_POST["sepeda_motor_tahun"];
		// generate nama image
		$image_name_new = uniqid();
		$image_name_new .= '.';
		$image_name_new .= $ekstensiGambar;

		// simpan gambar

		if (move_uploaded_file($image_tmp, '../img/ktp/' . $image_name_new)) {
				$query = "INSERT INTO `tabel_kurir` (`id_user`, `nomor_polisi`, `sepeda_motor`, `sepeda_motor_tahun`, `ktp`, `current_active`) VALUES ('$id_user', '$nomor_polisi', '$sepeda_motor','$sepeda_motor_tahun','$image_name_new', NOW())";
				$hasil = mysqli_query($koneksi,$query);
				echo '<script>
		setTimeout(function() {
			Swal.fire({
				icon: "success",
				tittle: "Berhasil Daftar",
				text: "Silahkan Login",
			}).then(function() {
				window.location = "../aut/login.php";
			});
		}, 1);
		</script>';
				return false;
		} else {
				echo "<script>alert('gagal upload');history.back()</script>";
				return false;
		}

		// $emailPengrim 	= 'hargakita2021@gmail.com';
		// $namaPengirim 	= 'hargakita';
		// $emailPenerima	= $email;
		// $subjek		  	= 'regristasi new member';
		// $pesan 			= 'verivied your account';
		
		// $mail			= new PHPMailer(true);
		// $mail->isSMTP();

		// $mail->Host		= 'smtp.gmail.com';
		// $mail->Username	= $emailPengrim;
		// $mail->Password = 'tmmvetnehijuyiuc';
		// $mail->Port		= 465;
		// $mail->SMTPAuth	= true;
		// $mail->SMTPDebug= 2;

		// $mail->setFrom($emailPengrim, $namaPengirim); 
		// $mail->addAddress($emailPenerima);
		// $mail->isHTML(true);
		// $mail->Subject = $subjek;
		// $mail->Body	= $pesan;
		// $send = $mail->send();

		// if ($send) {
		// 	echo "suksek terkirim";
		// }else{
		// 	echo 'enail gagal';
		// }

		// tambah toko
		// $query = "INSERT INTO `tabel_toko` 
		// 			(`kd_toko`, `nm_toko`, `almt_toko`, `kota_toko`, `kecamatan_toko`, `tlp_toko`, `fax_toko`, `logo`, `password`, `pass`, `status`, `tipe`, `headerfooter`, `background`, `tombol`) 
		// 		VALUES 
		// 			('$kode_toko', '$toko', 'Jl.Simp. Grajakan Blok III/20 Pandanwangi', 'Malang', 'Blimbing', '', '', '6212daecdaa68.png', '757f9d5b09cfd69699c86364746ad68e', '123456', '', '', '#1F0001', '#FF9F21', '#FF9F43')";
		// $hasil = mysqli_query($koneksi,$query);
		
	}
}
else{
	echo "<script>alert('Password Tidak Sesuai');history.go(-1) </script>";
}
?>
