<head>
	<!-- SweetAlert -->
    <script src="../app-assets/js/jquery3.6.0.min.js"></script>
    <script src="../app-assets/js/sweetalert2@11.js"></script>
</head>

<?php
	session_start();
	include "../inc/koneksi.php";
	$nama		= $_POST['nama'];	
	$password	= $_POST['pass'];
	
	$query	= "SELECT * FROM tabel_member WHERE nm_user  = '$nama'";
	$hasil	= mysqli_query($koneksi,$query);
	$data	= mysqli_fetch_assoc($hasil);
	
	$pengacak = "p3ng4c4k";
	
	$passmd = md5($pengacak . md5($password));
	if ($data == NULL || $passmd != $data['password'])
	{
		echo '<script>
				setTimeout(function() {
					Swal.fire({
						icon: "error",
						tittle: "Gagal login",
						text: "Periksa username dan password",
					}).then(function() {
						window.location = "login.php";
					});
				}, 1);
			</script>';
	} else if ($data['stt_user'] != 'AKTIF')
	{
		echo '<script>
				setTimeout(function() {
					Swal.fire({
						icon: "error",
						tittle: "Gagal login",
						text: "Akun anda belum aktif, Silahkan menghubungi admin",
					}).then(function() {
						window.location = "login.php";
					});
				}, 1);
			</script>';
	} else {
		
		$id						= $data['id_user'];
		$kode_user				= $data['kode_user'];
		$_SESSION['nm_user']	= $data['nm_user'];
		$_SESSION['kode_user']	= $data['kode_user'];
		$_SESSION['id_user']	= $data['id_user'];
		$_SESSION['email_user']	= $data['email_user'];
		$_SESSION['kd_toko']	= $data['kd_toko'];
		$_SESSION['akses']		= $data['akses'];
		if($data['akses'] == "kurir"){
			// var_dump($id); die();
			$hasil	= mysqli_query($koneksi,"SELECT id_kurir FROM tabel_kurir WHERE id_user  = '$kode_user'");
			$data	= mysqli_fetch_assoc($hasil);
			// var_dump($data); die();
			$_SESSION['id_kurir']		= isset($data['id_kurir']) ? $data['id_kurir'] : "";
		}else if($data['akses'] == "merchant"){
			$hasil	= mysqli_query($koneksi,"SELECT kd_merchant FROM tabel_merchant WHERE id_user  = '$kode_user'");
			$data	= mysqli_fetch_assoc($hasil);
			// var_dump($data); die();
			$_SESSION['kd_merchant']	= isset($data['kd_merchant']) ? $data['kd_merchant'] : "";
		}
		$update							= mysqli_query($koneksi, "UPDATE `tabel_member` SET `log` = now() WHERE `id_user` = '$id'");

		if (isset($data)) {
			if ($data['akses'] == 'gudang' || $data['akses'] == 'kasir') {
				
				echo '<script>
				setTimeout(function() {
					Swal.fire({
						icon: "success",
						tittle: "Berhasil Login",
						text: "Anda Berhak Mengakses Halaman Beranda",
					}).then(function() {
						window.location = "../page/?menu=inventory";
					});
				}, 1);
				</script>';

			} else {

				echo '<script>
				setTimeout(function() {
					Swal.fire({
						icon: "success",
						tittle: "Berhasil Login",
						text: "Anda Berhak Mengakses Halaman Beranda",
					}).then(function() {
						window.location = "../page/?menu=home";
					});
				}, 1);
				</script>';

			}
			
		} else {
			echo '<script>
			setTimeout(function() {
				Swal.fire({
					icon: "error",
					tittle: "Gagal login",
					text: "Akun anda belum aktif, Silahkan menghubungi admin",
				}).then(function() {
					window.location = "login.php";
				});
			}, 1);
			</script>';
		}
	
}
?>