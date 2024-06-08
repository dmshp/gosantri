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

if (isset($_POST['upload_edit_info'])) {

    $id = $_POST['id'];
    if (!$id) {
        echo "<script>alert('ID kosong');history.back()</script>";
        return false;
    }
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

    $query_tabel_info = "UPDATE tabel_info SET judul= '$judul' ,subjudul= '$subjudul', kd_kategori_info= '$kategori',informasi= '$desc' WHERE id_info='$id'";
    $hasil_tabel_info = mysqli_query($koneksi, $query_tabel_info);
    // var_dump($hasil_tabel_info);
    // die;

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
        // echo $value;
        $query_tabel_info_gambar = "UPDATE tabel_info_gambar SET gambar='$image_name_new' WHERE id_info='$id'";
        $hasil_tabel_info_gambar = mysqli_query($koneksi, $query_tabel_info_gambar);

        if ($hasil_tabel_info) {
            if ($hasil_tabel_info_gambar) {
                echo "<script>alert('Edit Info Berhasil');history.back()</script>";
            } else {
                echo "<script>alert('Edit Gambar Info Gagal');history.back()</script>";
            }
        } else {
            echo "<script>alert('Edit Info Gagal');history.back()</script>";
        }
    } 
    else {
        if ($hasil_tabel_info) {
            echo "<script>alert('Edit Info Berhasil');history.back()</script>";
        } else {
            echo "<script>alert('Edit Info Gagal');history.back()</script>";
        }
    }
}
