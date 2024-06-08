<?php 
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 
// var_dump($_POST);
// var_dump($_FILES);
//  die;

if(isset($_POST['upload_ads'])){

	
    $judul=$_POST['judul'];
    if(!$judul){
		echo "<script>alert('Tambah Judul');history.back()</script>";
		return false;
	}
	

    // upload image
	$image_name = $_FILES['image']['name'];
	$image_size = $_FILES['image']['size'];
	$image_tmp = $_FILES['image']['tmp_name'];
	$image_error = $_FILES['image']['error'];

	// cek image
	if($image_error === 4){
		echo "<script>alert('Tambah Image Kategori');history.back()</script>";
		return false;
	}

	// cek ekstensi
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode(".", $image_name);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ){
		echo "<script>alert('Hanya Menerima ekstensi jpg, jpeg dan png');history.back()</script>";
		return false;
	}

	// cek ukuran
	if($image_size > 100000){
		echo "<script>alert('Ukuran Image Harus < 1 Mb');history.back()</script>";
		return false;
	}

	// generate nama image
	$image_name_new = uniqid();
	$image_name_new .= '.';
	$image_name_new .= $ekstensiGambar;

	// simpan gambar
	move_uploaded_file($image_tmp, '../img/iklan/'.$image_name_new);

    $kategori = $_POST['kategori'];
	if(!$kategori){
		echo "<script>alert('Tambah Kategori');history.back()</script>";
		return false;
	}

    $keterangan=$_POST['keterangan'];
    if(!$keterangan){
		echo "<script>alert('Tambah Keterangan');history.back()</script>";
		return false;
	}

    $query_tabel_slide="INSERT INTO tabel_slide values ('','$kategori', '$image_name_new','$judul','$keterangan')";
    $hasil_tabel_slide=mysqli_query($koneksi,$query_tabel_slide);

	if($query_tabel_slide){
		echo "<script>alert('Upload Ads Berhasil');history.back()</script>";
	}
	else{
		echo "<script>alert('Upload Ads Gagal');history.back()</script>";
	}

}
?>