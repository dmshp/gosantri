<?php 
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 
// var_dump($_POST);
// var_dump($_FILES);
// die;

$varian="";

if(isset($_POST['panjang']))
{
	$varian .= "panjang,";
}
if(isset($_POST['lebar']))
{
	$varian .= "lebar,";
}
if(isset($_POST['tinggi']))
{
	$varian .= "tinggi,";
}
if(isset($_POST['warna']))
{
	$varian .= "warna,";
}
if(isset($_POST['type']))
{
	$varian .= "type";
}

// var_dump($varian); die;


if(isset($_POST['edit_kategori'])){
	$kd_kategori = $_POST['kd_kategori'];
	$nama = $_POST['kategori'];
	if(!$nama){
		echo "<script>alert('Tambah Nama Kategori');history.back()</script>";
	}
	$form = $_POST['form'];

	$image_name = $_FILES['gambar']['name'];
	$image_size = $_FILES['gambar']['size'];
	$image_tmp = $_FILES['gambar']['tmp_name'];
	$image_error = $_FILES['gambar']['error'];

	// cek image
	if($image_error === 4){
		$query = "UPDATE `tabel_kategori_barang` SET `nm_kategori`='$nama',`form`='$form',`varian`='$varian' WHERE `kd_kategori` = '$kd_kategori'";
		$hasil=mysqli_query($koneksi,$query);
		// echo $hasil;
		if($query){
				echo "<script type='text/javascript'>alert('Berhasil Tambah Kategori');history.back()</script>";
		}
	}
	else{	
		// cek ekstensi
		$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
		$ekstensiGambar = explode(".", $image_name);
		$ekstensiGambar = strtolower(end($ekstensiGambar));

		if( !in_array($ekstensiGambar, $ekstensiGambarValid) ){
			echo "<script>alert('Hanya Menerima ekstensi jpg, jpeg dan png');history.back()</script>";
		}

		// generate nama image
		$image_name_new = uniqid();
		$image_name_new .= '.';
		$image_name_new .= $ekstensiGambar;

		// simpan gambar
		$dest = '../img/kategori/'.$image_name_new;
		move_uploaded_file($image_tmp, $dest);

		// cek ukuran
		if($image_size > 50000){
			list($lebar, $tinggi) = getimagesize($dest);
			if($ekstensiGambar == 'png'){
				$file_baru = imagecreatefrompng($dest);
				$warna_baru = imagecreatetruecolor($lebar, $tinggi);
				imagecopyresampled($warna_baru, $file_baru, 0, 0, 0, 0, $lebar, $tinggi, $lebar, $tinggi);
				imagepng($warna_baru, $dest, 9);
			}
			else{
				$file_baru = imagecreatefromjpeg($dest);
				$warna_baru = imagecreatetruecolor($lebar, $tinggi);
				imagecopyresampled($warna_baru, $file_baru, 0, 0, 0, 0, $lebar, $tinggi, $lebar, $tinggi);
				imagejpeg($warna_baru, $dest, 10);
			}
		}

		
		$query = "UPDATE `tabel_kategori_barang` SET `nm_kategori`='$nama',`form`='$form',`ikon_kategori`='$image_name_new',`varian`='$varian' WHERE `kd_kategori` = '$kd_kategori'";
		$hasil=mysqli_query($koneksi,$query);
		// echo $hasil;
		if($query){
				echo "<script type='text/javascript'>alert('Berhasil Edit Kategori');history.back()</script>";
		}
	}

}

 ?>