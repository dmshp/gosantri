<head>
	<!-- SweetAlert -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
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

// var_dump($_POST);
// die;

$cekdulu= "SELECT * FROM tabel_member WHERE nm_user='$_POST[nama]' OR email_user='$_POST[email]'"; //username dan $_POST[un] diganti sesuai dengan yang kalian gunakan
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
}
else { 
	//proses menambahkan data, tambahkan sesuai dengan yang kalian gunakan
	// requirment
	if(!isset($_POST['validasi'])){
		echo "<script>alert('Validasi Persetujuan');history.back()</script>";
		return false;
	}

 	$email = $_POST['email'];
    $pass = $_POST['pass'];
    $password1 = $_POST['pass1'];
	$nama = $_POST['nama'];
	$akses = $_POST['akses'];
	$random = rand();
	$alamat = $_POST['alamat'];
	$no_tlv = $_POST['no_tlv'];

	$query = "";


	if($pass == $password1){
		$pengacak= "p3ng4c4k";
		
		$passmd = md5($pengacak . md5($pass));

		if($akses == 'merchant'){
			$status = "PENDING";
			$query = "INSERT INTO `tabel_member`
						(`kode_user`, `tgl_daftar`, `nm_user`, `email_user`, `password`,`pass_user`,`hp`,`akses`,`stt_user`) 
					VALUES 
						('$random',NOW(), '$nama', '$email','$passmd','$password1','$no_tlv','$akses','$status')";
		}
		else if($akses == 'member'){
			$query = "INSERT INTO `tabel_member`
						(`kode_user`, `tgl_daftar`, `nm_user`, `email_user`,`password`,`pass_user`,`hp`,`akses`,`stt_user`) 
					VALUES 
						('$random',NOW(), '$nama', '$email','$passmd','$password1','$no_tlv','$akses','AKTIF')";
		}
		
		$hasil = mysqli_query($koneksi,$query);

		if ($hasil) {
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
		}
	}
	else{
		//echo "<script>alert('Password Tidak Sesuai');history.go(-1) </script>";
		echo '<script>
				setTimeout(function() {
					Swal.fire({
						icon: "error",
						tittle: "Pendaftaran Gagal",
						text: "Silahkan cek data anda",
					}).then(function() {
						history.go(-1);
					});
				}, 1);
			</script>';
	}
}
?>
