<?php
session_start();

//var_dump($_SESSION['nm_user']);
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
}

$id_user = $_SESSION['id_user'];
if (isset($_POST['update_profile'])) {
		//$nama = $_POST['nm_user'];
		$email = $_POST['email'];
		$hp = $_POST['hp'];
		//$alamat = $_POST['alamat'];

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
        move_uploaded_file($image_tmp, '../img/user/' . $image_name_new);
        // Validate Image End
        // echo $value;
        $query_tabel_member = "UPDATE tabel_member SET foto='$image_name_new',email_user='$email',hp='$hp',alamat_user='$alamat' 
				WHERE id_user='$id_user'";
    } 
    else {
        $query_tabel_member = "UPDATE tabel_member SET email_user='$email',hp='$hp',alamat_user='$alamat' 
				WHERE id_user='$id_user'";
    }

    $hasil_tabel_member = mysqli_query($koneksi, $query_tabel_member);
		if ($hasil_tabel_member) {
				echo "<script>alert('Edit Profile Berhasil');location.replace(document.referrer);</script>";
		} else {
				echo "<script>alert('Edit Profile Gagal');history.back()</script>";
		}
}else if (isset($_POST['update_password'])) {
		$oldPassword = $_POST['oldPassword'];
		$newPassword = $_POST['newPassword'];
		$newPassword2 = $_POST['newPassword2'];
    if ($oldPassword == $newPassword) {
        echo "<script>alert('Password lama dan password baru tidak boleh sama');history.back()</script>";
        return false;
    }
    if ($newPassword != $newPassword2) {
        echo "<script>alert('Password baru tidak sama saat ketik ulang password');history.back()</script>";
        return false;
    }
		$t = mysqli_fetch_array(mysqli_query($koneksi, "SELECT id_user FROM tabel_member WHERE pass_user  = '$oldPassword' and id_user = '$id_user'"));
		if(!$t){ 
        echo "<script>alert('Password lama salah');history.back()</script>";
        return false;
		}
		$pengacak= "p3ng4c4k";
		$passmd = md5($pengacak . md5($newPassword2));
		
		$query_tabel_member = "UPDATE tabel_member SET password='$passmd',pass_user='$newPassword2' WHERE id_user='$id_user'";

    $hasil_tabel_member = mysqli_query($koneksi, $query_tabel_member);
		if ($hasil_tabel_member) {
				echo "<script>alert('Edit Password Berhasil');location.replace(document.referrer);</script>";
		} else {
				echo "<script>alert('Edit Password Gagal');history.back()</script>";
		}
}else if (isset($_POST['update_rekening'])) {
		$bank = $_POST['bank'];
		$an_rekening = $_POST['an_rekening'];
		$no_rekening = $_POST['no_rekening'];
		$query_tabel_member = "UPDATE tabel_member SET bank='$bank',an_rekening='$an_rekening',no_rekening='$no_rekening' 
				WHERE id_user='$id_user'";
    $hasil_tabel_member = mysqli_query($koneksi, $query_tabel_member);
		if ($hasil_tabel_member) {
				echo "<script>alert('Edit Rekening Berhasil');location.replace(document.referrer);</script>";
		} else {
				echo "<script>alert('Edit Rekening Gagal');history.back()</script>";
		}
}
