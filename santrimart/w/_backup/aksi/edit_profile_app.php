<head>
    <!-- SweetAlert -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <script src="../app-assets/js/jquery3.6.0.min.js"></script> -->
    <!-- <script src="../app-assets/js/sweetalert2@11.js"></script> -->
</head>

<?php
session_start();

//var_dump($_SESSION['nm_user']);
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
    header('location:../aut/login.php');
}


if (isset($_POST['upload_edit_profile_app'])) {

	$id 				= $_POST['id_toko'];
	$nama_toko 			= $_POST['nama'];
	$alamat 			= $_POST['alamat'];
	$kecamatan 			= $_POST['kecamatan'];
	$kota 				= $_POST['kota'];
	$telepon 			= $_POST['telepon'];
	$kerangan 			= $_POST['ket_toko'];
	$jargon 			= $_POST['jargon_toko'];
	$konten 			= $_POST['konten'];
	$ketentuan 			= $_POST['ketentuan'];
	$style_headerfooter = $_POST['style_headerfooter'];
	$style_background 	= $_POST['style_background'];
	$style_tombol 		= $_POST['style_tombol'];
	$google_map 		= $_POST['google_map'];
	$lat_pin 			= $_POST['lat_pin'];
	$lng_pin 			= $_POST['lng_pin'];
	$folder 	 		= "../img/logo/";
	$folder_banner 	 	= "../img/banner/";



	// if ($_FILES['header']['name'] != null && $_FILES['image']['name'] === null && $_FILES['login']['name'] === null) {

		// var_dump($_FILES['image']['name']); die();
		$image_size 	= $_FILES['image']['size'];
		$header_size 	= $_FILES['header']['size'];
		$login_size 	= $_FILES['login']['size'];
		$banner1_size 	= $_FILES['banner1']['size'];
		$banner2_size 	= $_FILES['banner2']['size'];
		$banner3_size 	= $_FILES['banner3']['size'];

		// cek ekstensi
        
		// ============================ LOGO APLIKASI ===================================

		$upload_logo_app = $_FILES['image']['name'];
		$ekstensiImageValid = ['jpg', 'jpeg', 'png'];
        $ekstensiImage = explode(".", $upload_logo_app);
        $ekstensiImage = strtolower(end($ekstensiImage));
		// tentukan ukuran width yang diharapkan
		$width_size = 1524;
		// tentukan di mana image akan ditempatkan setelah diupload
		$filesavelogo = $folder . $ekstensiImage;
		move_uploaded_file($_FILES['image']['tmp_name'], $filesavelogo);
		// menentukan nama image setelah dibuat
		$logo_name_new = uniqid(rand());
		$logo_name_new .= '.';
        $logo_name_new .= $ekstensiImage;
		$resize_logo_app = $folder.$logo_name_new;
		// mendapatkan ukuran width dan height dari image
		list( $width, $height ) = getimagesize($filesavelogo);
		// mendapatkan nilai pembagi supaya ukuran skala image yang dihasilkan sesuai dengan aslinya
		$k = $width / $width_size;
		// menentukan width yang baru
		$newwidth = $width / $k;
		// menentukan height yang baru
		$newheight = $height / $k;
		// fungsi untuk membuat image yang baru
		$thumb = imagecreatetruecolor($newwidth, $newheight);

		$source_logo = imagecreatefrompng($filesavelogo);
		// men-resize image yang baru
		imagecopyresized($thumb, $source_logo, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
		// menyimpan image yang baru
		imagepng($thumb, $resize_logo_app);
		imagedestroy($thumb);
		imagedestroy($source_logo);
		unlink($filesavelogo);

		// ============================ LOGO HEADER =====================================

		$upload_header_app = $_FILES['header']['name'];
		$ekstensiHeaderValid = ['jpg', 'jpeg', 'png'];
        $ekstensiHeader = explode(".", $upload_header_app);
        $ekstensiHeader = strtolower(end($ekstensiHeader));
		// tentukan ukuran width yang diharapkan
		$width_size = 1524;
		// tentukan di mana image akan ditempatkan setelah diupload
		$filesaveheader = $folder . $ekstensiHeader;
		move_uploaded_file($_FILES['header']['tmp_name'], $filesaveheader);
		// menentukan nama image setelah dibuat
		$header_name_new = uniqid(rand());
		$header_name_new .= '.';
        $header_name_new .= $ekstensiHeader;
		$resize_header_app = $folder.$header_name_new;
		// mendapatkan ukuran width dan height dari image
		list( $width, $height ) = getimagesize($filesaveheader);
		// mendapatkan nilai pembagi supaya ukuran skala image yang dihasilkan sesuai dengan aslinya
		$k = $width / $width_size;
		// menentukan width yang baru
		$newwidth = $width / $k;
		// menentukan height yang baru
		$newheight = $height / $k;
		// fungsi untuk membuat image yang baru
		$thumb = imagecreatetruecolor($newwidth, $newheight);

		$source_header = imagecreatefrompng($filesaveheader);
		// men-resize image yang baru
		imagecopyresized($thumb, $source_header, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
		// menyimpan image yang baru
		imagepng($thumb, $resize_header_app);
		imagedestroy($thumb);
		imagedestroy($source_header);
		unlink($filesaveheader);

		// ============================ LOGO LOGIN ======================================

		$upload_login_app = $_FILES['login']['name'];
		$ekstensiLoginValid = ['jpg', 'jpeg', 'png'];
        $ekstensiLogin = explode(".", $upload_login_app);
        $ekstensiLogin = strtolower(end($ekstensiLogin));
		// tentukan ukuran width yang diharapkan
		$width_size = 1524;
		// tentukan di mana image akan ditempatkan setelah diupload
		$filesavelogin = $folder . $ekstensiLogin;
		move_uploaded_file($_FILES['login']['tmp_name'], $filesavelogin);
		// menentukan nama image setelah dibuat
		$login_name_new = uniqid(rand());
		$login_name_new .= '.';
        $login_name_new .= $ekstensiLogin;
		$resize_login_app = $folder.$login_name_new;
		// mendapatkan ukuran width dan height dari image
		list( $width, $height ) = getimagesize($filesavelogin);
		// mendapatkan nilai pembagi supaya ukuran skala image yang dihasilkan sesuai dengan aslinya
		$k = $width / $width_size;
		// menentukan width yang baru
		$newwidth = $width / $k;
		// menentukan height yang baru
		$newheight = $height / $k;
		// fungsi untuk membuat image yang baru
		$thumb = imagecreatetruecolor($newwidth, $newheight);

		$source_login = imagecreatefrompng($filesavelogin);
		// men-resize image yang baru
		imagecopyresized($thumb, $source_login, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
		// menyimpan image yang baru
		imagepng($thumb, $resize_login_app);
		imagedestroy($thumb);
		imagedestroy($source_login);
		unlink($filesavelogin);

		// ============================ LOGO BANNER PERTAMA ======================================

		$upload_banner1 = $_FILES['banner1']['name'];
		$ekstensiBannerSatuValid = ['jpg', 'jpeg', 'png'];
        $ekstensiBannerSatu = explode(".", $upload_banner1);
        $ekstensiBannerSatu = strtolower(end($ekstensiBannerSatu));
		// tentukan ukuran width yang diharapkan
		$width_size = 1524;
		// tentukan di mana image akan ditempatkan setelah diupload
		$filesavebannersatu = $folder_banner . $ekstensiBannerSatu;
		move_uploaded_file($_FILES['banner1']['tmp_name'], $filesavebannersatu);
		// menentukan nama image setelah dibuat
		$bannersatu_name_new = uniqid(rand());
		$bannersatu_name_new .= '.';
        $bannersatu_name_new .= $ekstensiBannerSatu;
		$resize_bannersatu_app = $folder_banner.$bannersatu_name_new;
		// mendapatkan ukuran width dan height dari image
		list( $width, $height ) = getimagesize($filesavebannersatu);
		// mendapatkan nilai pembagi supaya ukuran skala image yang dihasilkan sesuai dengan aslinya
		$k = $width / $width_size;
		// menentukan width yang baru
		$newwidth = $width / $k;
		// menentukan height yang baru
		$newheight = $height / $k;
		// fungsi untuk membuat image yang baru
		$thumb = imagecreatetruecolor($newwidth, $newheight);

		$source_bannersatu = imagecreatefromjpeg($filesavebannersatu);
		// men-resize image yang baru
		imagecopyresized($thumb, $source_bannersatu, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
		// menyimpan image yang baru
		imagejpeg($thumb, $resize_bannersatu_app);
		imagedestroy($thumb);
		imagedestroy($source_bannersatu);
		unlink($filesavebannersatu);

		// ============================ LOGO BANNER KEDUA ======================================

		$upload_banner2 = $_FILES['banner2']['name'];
		$ekstensiBannerDuaValid = ['jpg', 'jpeg', 'png'];
        $ekstensiBannerDua = explode(".", $upload_banner2);
        $ekstensiBannerDua = strtolower(end($ekstensiBannerDua));
		// tentukan ukuran width yang diharapkan
		$width_size = 1524;
		// tentukan di mana image akan ditempatkan setelah diupload
		$filesavebannerdua = $folder_banner . $ekstensiBannerDua;
		move_uploaded_file($_FILES['banner2']['tmp_name'], $filesavebannerdua);
		// menentukan nama image setelah dibuat
		$bannerdua_name_new = uniqid(rand());
		$bannerdua_name_new .= '.';
        $bannerdua_name_new .= $ekstensiBannerDua;
		$resize_bannerdua_app = $folder_banner.$bannerdua_name_new;
		// mendapatkan ukuran width dan height dari image
		list( $width, $height ) = getimagesize($filesavebannerdua);
		// mendapatkan nilai pembagi supaya ukuran skala image yang dihasilkan sesuai dengan aslinya
		$k = $width / $width_size;
		// menentukan width yang baru
		$newwidth = $width / $k;
		// menentukan height yang baru
		$newheight = $height / $k;
		// fungsi untuk membuat image yang baru
		$thumb = imagecreatetruecolor($newwidth, $newheight);

		$source_bannerdua = imagecreatefromjpeg($filesavebannerdua);
		// men-resize image yang baru
		imagecopyresized($thumb, $source_bannerdua, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
		// menyimpan image yang baru
		imagejpeg($thumb, $resize_bannerdua_app);
		imagedestroy($thumb);
		imagedestroy($source_bannerdua);
		unlink($filesavebannerdua);

		// ============================ LOGO BANNER KETIGA ======================================

		$upload_banner3 = $_FILES['banner3']['name'];
		$ekstensiBannerTigaValid = ['jpg', 'jpeg', 'png'];
        $ekstensiBannerTiga = explode(".", $upload_banner3);
        $ekstensiBannerTiga = strtolower(end($ekstensiBannerTiga));
		// tentukan ukuran width yang diharapkan
		$width_size = 1524;
		// tentukan di mana image akan ditempatkan setelah diupload
		$filesavebannertiga = $folder_banner . $ekstensiBannerTiga;
		move_uploaded_file($_FILES['banner3']['tmp_name'], $filesavebannertiga);
		// menentukan nama image setelah dibuat
		$bannertiga_name_new = uniqid(rand());
		$bannertiga_name_new .= '.';
        $bannertiga_name_new .= $ekstensiBannerTiga;
		$resize_bannertiga_app = $folder_banner.$bannertiga_name_new;
		// mendapatkan ukuran width dan height dari image
		list( $width, $height ) = getimagesize($filesavebannertiga);
		// mendapatkan nilai pembagi supaya ukuran skala image yang dihasilkan sesuai dengan aslinya
		$k = $width / $width_size;
		// menentukan width yang baru
		$newwidth = $width / $k;
		// menentukan height yang baru
		$newheight = $height / $k;
		// fungsi untuk membuat image yang baru
		$thumb = imagecreatetruecolor($newwidth, $newheight);

		$source_bannertiga = imagecreatefromjpeg($filesavebannertiga);
		// men-resize image yang baru
		imagecopyresized($thumb, $source_bannertiga, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
		// menyimpan image yang baru
		imagejpeg($thumb, $resize_bannertiga_app);
		imagedestroy($thumb);
		imagedestroy($source_bannertiga);
		unlink($filesavebannertiga);




		$query = "UPDATE tabel_toko SET nm_toko= '$nama_toko', almt_toko = '$alamat', kota_toko = '$kota', kecamatan_toko = '$kecamatan', ket_toko= '$kerangan', jargon_toko = '$jargon', tlp_toko = '$telepon', logo= '$logo_name_new', logo_header= '$header_name_new', logo_login='$login_name_new', headerfooter= '$style_headerfooter', background= '$style_background', tombol= '$style_tombol',  latitude ='$lat_pin', longitude='$lng_pin', konten='$konten', ketentuan='$ketentuan', google_map = '$google_map', banner1= '$bannersatu_name_new', banner2= '$bannerdua_name_new', banner3= '$bannertiga_name_new' WHERE kd_toko = '$id'";

		$id_user = $_SESSION['id_user'];
        $query_tabel_member = "UPDATE `tabel_member` SET `foto`='$header_name_new' WHERE `id_user` = '$id_user'";
		mysqli_query($koneksi, $query_tabel_member);

	// } else {

	// 	$query = "UPDATE tabel_toko SET nm_toko= '$nama_toko', almt_toko = '$alamat', kota_toko = '$kota', kecamatan_toko = '$kecamatan', ket_toko= '$kerangan', jargon_toko = '$jargon', tlp_toko = '$telepon', headerfooter= '$style_headerfooter', background= '$style_background', tombol= '$style_tombol',  latitude ='$lat_pin', longitude='$lng_pin', konten='$konten', ketentuan='$ketentuan', google_map = '$google_map' WHERE kd_toko = '$id'";

	// }

	$n = mysqli_query($koneksi, $query);
    if ($n != null) {
    	echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        tittle: "INFORMASI",
                        icon: "success",
                        text: "Data Berhasil disimpan",
                    }).then(function() {
                        history.back();
                    });
                }, 1);
            </script>';
        // echo "<script>alert('Edit Data Berhasil');history.back()</script>";
    } else {
    	echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        tittle: "INFORMASI",
                        icon: "warning",
                        text: "Data Gagal disimpan",
                    }).then(function() {
                        history.back();
                    });
                }, 1);
            </script>';
        // echo "<script>alert('Edit Data Gagal');history.back()</script>";
    }


}



if (isset($_POST['upload_edit_password_toko'])) {

    $id = $_POST['id_toko'];
    $query_tabel_toko = "SELECT  `password`, `pass` FROM `tabel_toko` WHERE `kd_toko` = '$id'";
    $hasil_tabel_toko = mysqli_fetch_array(mysqli_query($koneksi, $query_tabel_toko));

    $old_password = $_POST['old_password'];
    $pengacak = "p3ng4c4k";

    $old_password = md5($pengacak . md5($old_password));
    if ($old_password != $hasil_tabel_toko['password']) {
        echo "<script>alert('Password lama salah');history.back()</script>";
        return false;
    }
    $new_password = $_POST['new_password'];
    if (!$new_password) {
        echo "<script>alert('Isi new password');history.back()</script>";
        return false;
    }
    $confirm = $_POST['confirm_pass_user'];
    if ($new_password !== $confirm) {
        echo "<script>alert('Konfirmasi Password Salah');history.back()</script>";
        return false;
    } else {
        $new_password = md5($pengacak . md5($new_password));
    }

    $query_tabel_toko = "UPDATE `tabel_toko` SET `password`='$new_password',`pass`='$confirm' WHERE `kd_toko` = '$id'";
    $hasil_tabel_toko = mysqli_query($koneksi, $query_tabel_toko);

    if ($hasil_tabel_toko != null) {
    	echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        tittle: "INFORMASI",
                        icon: "success",
                        text: "Password Toko Berhasil disimpan",
                    }).then(function() {
                        history.back();
                    });
                }, 1);
            </script>';
        // echo "<script>alert('Edit Password Toko Berhasil');history.back()</script>";
    } else {
    	echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        tittle: "INFORMASI",
                        icon: "warning",
                        text: "Password Toko Gagal disimpan",
                    }).then(function() {
                        history.back();
                    });
                }, 1);
            </script>';
        // echo "<script>alert('Edit Password Toko Gagal');history.back()</script>";
    }
}

if (isset($_POST['upload_edit_medsos_toko'])) {

    $id = $_POST['id_toko'];
    $twitter = $_POST['account-twitter'];
    $facebook = $_POST['account-facebook'];
    $google = $_POST['account-google'];
    $tiktok = $_POST['account-tiktok'];
    $instagram = $_POST['account-instagram'];

    $query_tabel_medsos_toko = "SELECT * FROM `tabel_medsos_toko` WHERE `id_toko` = '$id'";
    $hasil_tabel_medsos_toko = mysqli_fetch_array(mysqli_query($koneksi, $query_tabel_medsos_toko));
    // echo $id;
    // var_dump($hasil_tabel_medsos_toko);
    if ($hasil_tabel_medsos_toko == null) {
        $query_tabel_medsos_toko = "INSERT INTO `tabel_medsos_toko`(`id_toko`, `twitter`, `facebook`, `google`, `tiktok`, `instagram`) VALUES ('$id','$twitter','$facebook','$google','$tiktok','$instagram')";
    } else {
        $query_tabel_medsos_toko = "UPDATE `tabel_medsos_toko` SET `twitter`='$twitter',`facebook`='$facebook',`google`='$google',`tiktok`='$tiktok',`instagram`='$instagram' WHERE `id_toko` = '$id'";
    }
    $hasil_tabel_medsos_toko = mysqli_query($koneksi, $query_tabel_medsos_toko);

    if ($hasil_tabel_medsos_toko != null) {
        // echo "<script>alert('Medsos Toko Berhasil');history.back()</script>";
        echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        tittle: "INFORMASI",
                        icon: "success",
                        text: "Medsos Toko Berhasil disimpan",
                    }).then(function() {
                        history.back();
                    });
                }, 1);
            </script>';
    } else {
        // echo "<script>alert('Medsos Toko Gagal');history.back()</script>";
        echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        tittle: "INFORMASI",
                        icon: "warning",
                        text: "Medsos Toko Gagal disimpan",
                    }).then(function() {
                        history.back();
                    });
                }, 1);
            </script>';
    }
}