<?php
session_start();
include_once '../inc/koneksi.php';


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
								$noFaktur = $_POST['faktur'];
								$bank = $_POST['bank'];
								$query = "INSERT INTO `tabel_bukti_pembayaran` ( `gmb_bukti`, `status`, `tgl_bukti`, `bank`, `no_faktur_pembelian`) VALUES  ('$image_name_new',0,NOW(),'$bank','$noFaktur')";
								mysqli_query($koneksi, $query);
								$query = "SELECT LAST_INSERT_ID() as id";
								$executeQue = mysqli_query($koneksi, $query);
								$g = mysqli_fetch_array($executeQue);

								$id_bukti = $g['id'];

								$query = "UPDATE tabel_pembelian set status = 'check', id_bukti='$id_bukti' WHERE no_faktur_pembelian = '$noFaktur'";
								mysqli_query($koneksi, $query);
								echo "<script>window.location.href = '../page/index.php?menu=history';</script>";
						} else {
								echo "<script>alert('gagal upload');history.back()</script>";
						}
				}
		} else {
			echo "<script>alert('ERROR: Bukti Transfer harus diisid');history.back()</script>";
		}
}