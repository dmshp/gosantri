<?php
session_start();
include "../inc/koneksi.php";

$id_user =  $_SESSION['id_user'];
$tanggal = $_POST['tanggal'];
$jumlah =  $_POST['nominal'];
$bank = $_POST['bank'];

if (isset($_POST['submit'])) {
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
						echo "<script>alert('Hanya Menerima ekstensi jpg, jpeg dan png');history.back()</script>";
				}else if ($image_size > 1000000) { // cek ukuran
						echo "<script>alert('Ukuran Image Harus < 1 Mb');history.back()</script>";
				}else{
						// generate nama image
						$image_name_new = uniqid();
						$image_name_new .= '.';
						$image_name_new .= $ekstensiGambar;

						// simpan gambar

						if (move_uploaded_file($image_tmp, '../img/buktiBayar/' . $image_name_new)) {
								$query = "INSERT INTO `tabel_bukti_pembayaran` ( `gmb_bukti`, `status`, `tgl_bukti`, `bank`) VALUES ('$image_name_new',0,'$tanggal','$bank')";
								mysqli_query($koneksi, $query);
								
								$g = mysqli_fetch_array(mysqli_query($koneksi, "SELECT LAST_INSERT_ID() as id"));
								$id_bukti = $g['id'];

								$query_keuangan = "INSERT INTO `tabel_keuangan` (`id_member`, `tanggal`, `nominal`, `arus`, `no_faktur_pembelian`, `status`,`id_bukti`) VALUES ('$id_user',NOW(),'$jumlah',0,'topup',0,'$id_bukti')";
								$b = mysqli_query($koneksi, $query_keuangan);
								echo "<script>window.location.href = '../page/index.php?menu=saldo';</script>";
						} else {
								echo "<script>alert('gagal upload');history.back()</script>";
						}
				}
		} else {
			echo "<script>alert('ERROR: Bukti Transfer harus diisid');history.back()</script>";
		}
}