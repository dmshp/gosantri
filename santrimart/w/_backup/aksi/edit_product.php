<?php 
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 
// var_dump($_POST);
// var_dump($_FILES);
// var_dump($_FILES);
// echo count($_FILES);
// die;


if(isset($_POST['upload_edit_product'])){

	$kode = "";
	$nama = "";
	$kategori = "";
	$merk = "";
	$satuan = "";
	$panjang = "";
	$lebar = "";
	$tinggi = "";
	$warna = "";
	$type = "";
	$harga_beli = "";
	$harga_jual = "";
	$harga_grosir = "";
	$deskripsi = "";
	$stok = "";
 
	$image_name = [];
	$image_size = [];
	$image_tm = [];
	$image_error = [];
	$image_name_new = [];
	$images = "";


	$kode = $_POST['kode'];

	// upload image
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];

	$query_tabel_barang_gambar = "SELECT * FROM `tabel_barang_gambar` WHERE `id_brg` = '$kode'";
	$hasil_tabel_barang_gambar = mysqli_fetch_array(mysqli_query($koneksi, $query_tabel_barang_gambar));
	$gambars = $hasil_tabel_barang_gambar['gambar'];
	$gambars = explode(",", $gambars);
	// var_dump($gambars);
	// die;

	for ($i=0; $i < count($_FILES) ; $i++) { 
		$index_img = $i+1;

		if($_FILES['edit-image'.$index_img]['name'] != null){
			$image_name[$i] = $_FILES['edit-image'.$index_img]['name'];
			$image_size[$i] = $_FILES['edit-image'.$index_img]['size'];
			$image_tmp[$i] = $_FILES['edit-image'.$index_img]['tmp_name'];
			$image_error[$i] = $_FILES['edit-image'.$index_img]['error'];

			// cek ekstensi
			if($image_name[$i] != ""){
				$ekstensiGambar = explode(".", $image_name[$i]);
				$ekstensiGambar = strtolower(end($ekstensiGambar));
				if( !in_array($ekstensiGambar, $ekstensiGambarValid) ){
					echo "<script>alert('Hanya Menerima ekstensi jpg, jpeg dan png');history.back()</script>";
					return false;
				}
				// generate nama image
				$image_name_new[$i] = uniqid();
				$image_name_new[$i] .= '.';
				$image_name_new[$i] .= $ekstensiGambar;

				// simpan gambar
				move_uploaded_file($image_tmp[$i], '../img/produk/'.$image_name_new[$i]);
				$images .= $image_name_new[$i].',';
			}

			// cek ukuran
			// if($image_size[$i] > 100000){
			// 	echo "<script>alert('Ukuran Image Harus < 1 Mb');history.back()</script>";
			// 	return false;
			// }
		}
		else{
			if($_POST['cek_hapus'.$index_img] == '1'){
				$images .= 'kosong,';
			}
			else{
				$images .= $gambars[$i].',';;
			}
		}
	}


	$images = substr($images, 0, -1);
	// var_dump($images);
	// die;


	$nama = $_POST['nama'];
	if(!$nama){
		echo "<script>alert('Tambah nama');history.back()</script>";
		return false;
	}
	$kategori = $_POST['kategori'];
	if(!$kategori){
		echo "<script>alert('Tambah Kategori');history.back()</script>";
		return false;
	}
	$merk = $_POST['merk'];
	if(!$merk){
		echo "<script>alert('Tambah Merk');history.back()</script>";
		return false;
	}
	$satuan = $_POST['satuan'];
	if(!$satuan){
		echo "<script>alert('Tambah satuan');history.back()</script>";
		return false;
	}
	if(isset($_POST['berat']))
	{
		$berat = $_POST['berat'];
	}
	if(isset($_POST['panjang']))
	{
		$panjang = $_POST['panjang'];
	}
	if(isset($_POST['lebar']))
	{
		$lebar = $_POST['lebar'];
	}
	if(isset($_POST['tinggi']))
	{
		$tinggi = $_POST['tinggi'];
	}
	if(isset($_POST['warna']))
	{
		$warna = $_POST['warna'];
	}
	if(isset($_POST['type']))
	{
		$type = $_POST['type'];
	}

	$harga_beli = $_POST['harga_beli'];
	if(!$harga_beli){
		echo "<script>alert('Tambah harga_beli');history.back()</script>";
		return false;
	}
	$harga_jual = $_POST['harga_jual'];
	if(!$harga_jual){
		echo "<script>alert('Tambah harga_jual');history.back()</script>";
		return false;
	}
	$harga_grosir = $_POST['harga_grosir'];
	// if(!$harga_grosir){
	// 	echo "<script>alert('Tambah harga_grosir');history.back()</script>";
	// 	return false;
	// }
	$deskripsi = $_POST['deskripsi'];
	if(!$deskripsi){
		echo "<script>alert('Tambah deskripsi');history.back()</script>";
		return false;
	}
	$kd_toko = $_SESSION['kd_toko'];
	$diskon = "";
	$hrg_jual_disk = "";


	$stok = $_POST['stok'];
	// if(!$stok){
	// 	echo "<script>alert('Tambah stok');history.back()</script>";
	// 	return false;
	// }

	// var_dump($images);
	// die;

	$query_tabel_barang = "UPDATE `tabel_barang` SET `nm_barang`='$nama',`kd_satuan`='$satuan',`kd_kategori`='$kategori',`kd_toko`='$kd_toko',`deskripsi`='$deskripsi',`berat`='$berat',`panjang`='$panjang',`lebar`='$lebar',`tinggi`='$tinggi',`warna`='$warna',`tipe`='$type',`merek`='$merk',`hrg_jual`='$harga_jual',`hrg_grosir`='$harga_grosir',`hrg_beli`='$harga_beli',`diskon`='$diskon',`hrg_jual_disk`='$hrg_jual_disk' WHERE  `kd_barang`='$kode'";
	$hasil_tabel_barang=mysqli_query($koneksi,$query_tabel_barang);
	
	$query_tabel_barang_gambar = "UPDATE `tabel_barang_gambar` SET `gambar`='$images' WHERE `id_brg` = '$kode'";
	$hasil_tabel_barang_gambar=mysqli_query($koneksi,$query_tabel_barang_gambar);
	
	$query_tabel_stok_toko = "UPDATE `tabel_stok_toko` SET `stok`='$stok' WHERE `kd_barang`='$kode'";
	$hasil_tabel_stok_toko=mysqli_query($koneksi,$query_tabel_stok_toko);

	if($query_tabel_barang){
		if($query_tabel_barang_gambar){
			if($query_tabel_stok_toko){
				echo "<script>alert('Edit Produk Berhasil');history.go(-2)</script>";
			}
			else{
				echo "<script>alert('Edit Produk Gagal');history.go(-2)</script>";
			}
		}
		else{
			echo "<script>alert('Edit Produk Gagal');history.go(-2)</script>";
		}
	}
	else{
		echo "<script>alert('Edit Produk Gagal');history.go(-2)</script>";
	}
}

 ?>