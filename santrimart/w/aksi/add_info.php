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

if (isset($_POST['info_user'])) {

    $judul = $_POST['judul'];
    if (!$judul) {
        echo "<script>alert('Tambah Judul');history.back()</script>";
        return false;
    }
    $subjudul = $_POST['sub_judul'];
    if (!$subjudul) {
        echo "<script>alert('Tambah Sub Judul');history.back()</script>";
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
    move_uploaded_file($image_tmp, '../img/info/' . $image_name_new);
    // Validate Image End

    $kategori = $_POST['kategori'];
    if (!$kategori) {
        echo "<script>alert('Tambah Kategori');history.back()</script>";
        return false;
    }
    $desc = $_POST['desc'];
    if (!$desc) {
        echo "<script>alert('Tambah Deskripsi');history.back()</script>";
        return false;
    }
    $penulis = $_SESSION['nm_user'];

    $query_tabel_info = "INSERT INTO tabel_info values('','$kategori','$judul','$subjudul','$penulis',now(),'$desc','')";
    $hasil_tabel_info = mysqli_query($koneksi, $query_tabel_info);


    $query_getid_tabel_info = "SELECT id_info from tabel_info WHERE judul='$judul' AND subjudul='$subjudul'";
    $hasil_getid_tabel_info = mysqli_query($koneksi, $query_getid_tabel_info)->fetch_assoc();

    foreach ($hasil_getid_tabel_info as $value) {
        $query_tabel_info_gambar = "INSERT INTO tabel_info_gambar values('','$value','$image_name_new','')";
        $hasil_tabel_info_gambar = mysqli_query($koneksi, $query_tabel_info_gambar);
    }
        // var_dump($hasil_tabel_info_gambar);
        // die;

    if ($hasil_tabel_info) {
        if ($hasil_tabel_info_gambar) {
            echo "<script>alert('Upload Info Berhasil');history.back()</script>";
        } else {
            echo "<script>alert('Upload Info Gagal');history.back()/script>";
        }
    } else {
        echo "<script>alert('Upload Info Gagal');history.back()</script>";
    }
}
