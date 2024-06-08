<?php
session_start();

//var_dump($_SESSION['nm_user']);
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
    header('location:../aut/login.php');
}
// var_dump($_FILES);
// var_dump($_POST);
// die;

if (isset($_POST['upload_edit_toko'])) {

    $id = $_POST['id_toko'];
    $nama_toko = $_POST['nama'];
    if (!$nama_toko) {
        echo "<script>alert('Nama toko kosong');history.back()</script>";
        return false;
    }
    $alamat = $_POST['alamat'];
    if (!$alamat) {
        echo "<script>alert('Alamat toko kosong');history.back()</script>";
        return false;
    }
    $kota = $_POST['kota'];
    if (!$kota) {
        echo "<script>alert('Kota toko kosong');history.back()</script>";
        return false;
    }

    $kecamatan = $_POST['kecamatan'];
    if (!$kecamatan) {
        echo "<script>alert('Kecamatan toko kosong');history.back()</script>";
        return false;
    }

    $konten = $_POST['konten'];
    if (!$konten) {
        echo "<script>alert('Konten toko kosong');history.back()</script>";
        return false;
    }
    $ketentuan = $_POST['ketentuan'];
    if (!$ketentuan) {
        echo "<script>alert('Konten toko kosong');history.back()</script>";
        return false;
    }
		$lat_pin = $_POST['lat_pin'];
		$lng_pin = $_POST['lng_pin'];

    $style_headerfooter = $_POST['style_headerfooter'];
    $style_background = $_POST['style_background'];
    $style_tombol = $_POST['style_tombol'];


    if ($_FILES['header']['name'] != null) {
        $header_name = $_FILES['header']['name'];
        $header_size = $_FILES['header']['size'];
        $header_tmp = $_FILES['header']['tmp_name'];
        $header_error = $_FILES['header']['error'];

        // cek image
        if ($header_error === 4) {
            echo "<script>alert('Tambah Foto Index');history.back()</script>";
            return false;
        }

        // cek ekstensi
        $ekstensiHeaderValid = ['jpg', 'jpeg', 'png'];
        $ekstensiHeader = explode(".", $header_name);
        $ekstensiHeader = strtolower(end($ekstensiHeader));
        if (!in_array($ekstensiHeader, $ekstensiHeaderValid)) {
            echo "<script>alert('Hanya Menerima ekstensi jpg, jpeg dan png');history.back()</script>";
            return false;
        }

        // cek ukuran
        if ($header_size > 1000000) {
            echo "<script>alert('Ukuran Image Harus < 1 Mb');history.back()</script>";
            return false;
        }

        // generate nama image
        $header_name_new = uniqid();
        $header_name_new .= '.';
        $header_name_new .= $ekstensiHeader;

        // simpan gambar
        move_uploaded_file($header_tmp, '../img/toko/' . $header_name_new);
        // return $header_name_new;
        $query_tabel_toko = "UPDATE `tabel_toko` SET `nm_toko`='$nama_toko',`almt_toko`='$alamat',`kota_toko`='$kota',`kecamatan_toko`='$kecamatan',`logo_header`='$header_name_new',`headerfooter`='$style_headerfooter',`background`='$style_background',`tombol`='$style_tombol', `konten`='$konten',`ketentuan`='$ketentuan', latitude='$lat_pin', longitude='$lng_pin' WHERE `kd_toko` = '$id'";
        
				$id_user = $_SESSION['id_user'];
        $query_tabel_member = "UPDATE `tabel_member` SET `foto`='$header_name_new' WHERE `id_user` = '$id_user'";
				mysqli_query($koneksi, $query_tabel_member);
    } else {
        $query_tabel_toko = "UPDATE `tabel_toko` SET `nm_toko`='$nama_toko',`almt_toko`='$alamat',`kota_toko`='$kota',`kecamatan_toko`='$kecamatan',`headerfooter`='$style_headerfooter',`background`='$style_background',`tombol`='$style_tombol', `konten`='$konten', `ketentuan`='$ketentuan', latitude='$lat_pin', longitude='$lng_pin' WHERE `kd_toko` = '$id'";
    }


    if ($_FILES['image']['name'] != null) {
        $image_name = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_error = $_FILES['image']['error'];

        // cek image
        if ($image_error === 4) {
            echo "<script>alert('Tambah Foto Index');history.back()</script>";
            return false;
        }

        // cek ekstensi
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode(".", $image_name);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>alert('Hanya Menerima ekstensi jpg, jpeg dan png');history.back()</script>";
            return false;
        }

        // cek ukuran
        if ($image_size > 1000000) {
            echo "<script>alert('Ukuran Image Harus < 1 Mb');history.back()</script>";
            return false;
        }

        // generate nama image
        $image_name_new = uniqid();
        $image_name_new .= '.';
        $image_name_new .= $ekstensiGambar;

        // simpan gambar
        move_uploaded_file($image_tmp, '../img/toko/' . $image_name_new);

        $query_tabel_toko = "UPDATE `tabel_toko` SET `nm_toko`='$nama_toko',`almt_toko`='$alamat',`kota_toko`='$kota',`kecamatan_toko`='$kecamatan',`logo`='$image_name_new',`headerfooter`='$style_headerfooter',`background`='$style_background',`tombol`='$style_tombol', `konten`='$konten', `ketentuan`='$ketentuan', latitude='$lat_pin', longitude='$lng_pin' WHERE `kd_toko` = '$id'";
        
				$id_user = $_SESSION['id_user'];
        $query_tabel_member = "UPDATE `tabel_member` SET `foto`='$image_name_new' WHERE `id_user` = '$id_user'";
				mysqli_query($koneksi, $query_tabel_member);
    } else {
        $query_tabel_toko = "UPDATE `tabel_toko` SET `nm_toko`='$nama_toko',`almt_toko`='$alamat',`kota_toko`='$kota',`kecamatan_toko`='$kecamatan',`headerfooter`='$style_headerfooter',`background`='$style_background',`tombol`='$style_tombol', `konten`='$konten',`ketentuan`='$ketentuan', latitude='$lat_pin', longitude='$lng_pin' WHERE `kd_toko` = '$id'";
    }

    $hasil_tabel_toko = mysqli_query($koneksi, $query_tabel_toko);
    var_dump($hasil_tabel_toko);

    if ($hasil_tabel_toko) {
        echo "<script>alert('Edit Toko Berhasil');history.back()</script>";
    } else {
        echo "<script>alert('Edit Toko Gagal');</script>";
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

    if ($hasil_tabel_toko) {
        echo "<script>alert('Edit Password Toko Berhasil');history.back()</script>";
    } else {
        echo "<script>alert('Edit Password Toko Gagal');history.back()</script>";
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

    if ($hasil_tabel_medsos_toko) {
        echo "<script>alert('Medsos Toko Berhasil');history.back()</script>";
    } else {
        echo "<script>alert('Medsos Toko Gagal');history.back()</script>";
    }
}