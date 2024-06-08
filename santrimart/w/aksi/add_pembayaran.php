<?php
session_start();
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 

// var_dump($_POST);
// var_dump($_FILES);
// die;

//var_dump($_SESSION['nm_user']);
include '../inc/koneksi.php';

if (isset($_POST['add_pembayaran'])) {

    $kategori = $_POST['kategori'];
    if (!$kategori) {
        echo "<script>alert('Tambah kategori');history.back()</script>";
        return false;
    }
    $bank = $_POST['bank'];
    if (!$bank) {
        echo "<script>alert('Tambah nama bank');history.back()</script>";
        return false;
    }
    // Validate Image Start
    // upload image
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
    if ($image_size > 100000) {
        echo "<script>alert('Ukuran Image Harus < 1 Mb');history.back()</script>";
        return false;
    }

    // generate nama image
    $image_name_new = uniqid();
    $image_name_new .= '.';
    $image_name_new .= $ekstensiGambar;

    // simpan gambar
    move_uploaded_file($image_tmp, '../img/pembayaran/' . $image_name_new);
    // Validate Image End

    $desc = $_POST['desc'];
    if (!$desc) {
        echo "<script>alert('Tambah Deskripsi');history.back()</script>";
        return false;
    }
		if(isset($_POST['upload_bukti'])){
    	$upload_bukti = 1;
		}else{
    	$upload_bukti = 0;
		}
    $an_rekening = $_POST['an_rekening'];
    $no_rekening = $_POST['no_rekening'];
    $biaya_transfer = $_POST['biaya_transfer'];
    $biaya_transfer_persen = $_POST['biaya_transfer_persen'];
    $urutan = $_POST['urutan'];

    $query_tabel_info = "INSERT INTO tabel_pembayaran values('','$bank','$desc','$kategori','$image_name_new','$biaya_transfer','$biaya_transfer_persen','$an_rekening','$no_rekening','$upload_bukti',0,'$urutan')";
    $hasil_tabel_info = mysqli_query($koneksi, $query_tabel_info);

    if ($hasil_tabel_info) {
				echo "<script>alert('Tambah Pembayaran Berhasil');location.replace(document.referrer);</script>";
    } else {
        echo "<script>alert('Tambah Pembayaran Gagal');history.back()</script>";
    }
}
