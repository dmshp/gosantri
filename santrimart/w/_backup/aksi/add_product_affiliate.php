<head>
    <script src="../app-assets/js/jquery3.6.0.min.js"></script>
    <script src="../app-assets/js/sweetalert2@11.js"></script>
</head>

<?php 
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
}

$kode_user    = $_SESSION['kode_user'];
$nm_watermark = mysqli_fetch_array(mysqli_query($koneksi, "SELECT foto FROM tabel_member where kode_user = '$kode_user' limit 1"));
$kd_merchant = mysqli_fetch_array(mysqli_query($koneksi, "SELECT kd_merchant FROM tabel_merchant where id_user = '$kode_user'"));

// var_dump($_POST);
// var_dump($_FILES);
// var_dump($kode_user);
// var_dump($nm_watermark);
// var_dump($kd_merchant);
// die;


if(isset($_POST['upload_product'])){

	$kd_toko = $_SESSION['kd_toko'];
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
	$komisi = "";


	$image_name = [];
	$image_size = [];
	$image_tm = [];
	$image_error = [];
	$image_name_new = [];
	$images = "";

	// upload image
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];

	// Memuat gambar watermark
  $watermark = imagecreatefrompng('../img/toko/'.$nm_watermark);

  // mendapatkan lebar dan tinggi dari gambar watermark
  $water_width = imagesx($watermark);
  $water_height = imagesy($watermark);

  // Menetapkan posisi gambar watermark
  $dime_x = 8;
  $dime_y = 8;

	for ($i=0; $i < count($_FILES) ; $i++) { 
		$index_img = $i+1;
		$image_name[$i] = $_FILES['image'.$index_img]['name'];
		$image_size[$i] = $_FILES['image'.$index_img]['size'];
		$image_tmp[$i] = $_FILES['image'.$index_img]['tmp_name'];
		$image_error[$i] = $_FILES['image'.$index_img]['error'];

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
			$dest = '../img/produk/'.$image_name_new[$i];
			move_uploaded_file($image_tmp[$i], $dest);
			$images .= $image_name_new[$i].',';

			// cek ukuran
			if($image_size[$i] > 50000){
				list($lebar, $tinggi) = getimagesize($dest);
				if($ekstensiGambar == 'jpg'){
					$file_baru = imagecreatefrompng($dest);
					$warna_baru = imagecreatetruecolor($lebar, $tinggi);
					// imagecopy($file_baru, $watermark, $dime_x, $dime_y, 0, 0, $lebar, $tinggi);
					imagecopyresampled($warna_baru, $file_baru, 0, 0, 0, 0, $lebar, $tinggi, $lebar, $tinggi);
					imagepng($warna_baru, $dest, 9);
				}
				else{
					$file_baru = imagecreatefromjpeg($dest);
					$warna_baru = imagecreatetruecolor($lebar, $tinggi);
					// imagecopy($file_baru, $watermark, $dime_x, $dime_y, 0, 0, $lebar, $tinggi);
					imagecopyresampled($warna_baru, $file_baru, 0, 0, 0, 0, $lebar, $tinggi, $lebar, $tinggi);
					imagejpeg($warna_baru, $dest, 10);
				}
			}
		}
		else{
			$images .= 'kosong,';
		}

	}
	// cek image
	// if($image_error[0] === 4 && $image_error[1] === 4 && $image_error[2] === 4){
	// 	echo "<script>alert('Tambah Image Kategori');history.back()</script>";
	// 	return false;
	// }

	$images = substr($images, 0, -1);
	// var_dump($images);
 // die;



	$kode = $_POST['kode'];
	if(!$kode){
		echo "<script>alert('Tambah Kode');history.back()</script>";
		return false;
	}

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
	$diskon 				= "";
	$hrg_jual_disk 	= "";
	$hrg_jual 			= $harga_jual + ($harga_jual * 0.05);   // ditambah 5% untuk biaya admin
	$hrg_grosir 		= $harga_grosir + ($harga_grosir * 0.05); // ditambah 5% untuk biaya admin

	// var_dump($hrg_jual);
	// var_dump($hrg_grosir);
	// die();


	$stok = $_POST['stok'];
	$komisi = $_POST['komisi'] . '%';
	// if(!$stok){
	// 	echo "<script>alert('Tambah stok');history.back()</script>";
	// 	return false;
	$query_tabel_barang = "INSERT INTO tabel_barang values('$kode', '$nama', '$satuan', '$kategori', '$kode_user', '$kd_toko' , '$deskripsi', '$berat', '$panjang', '$lebar', '$tinggi', '$warna', '$type', '$merk',  '$harga_beli', '$hrg_grosir',  '$hrg_jual', '$diskon', '$hrg_jual_disk', '$komisi')";
	$hasil_tabel_barang=mysqli_query($koneksi,$query_tabel_barang);
	
	$query_tabel_barang_gambar = "INSERT INTO tabel_barang_gambar values('','$kode','$images','')";
	$hasil_tabel_barang_gambar=mysqli_query($koneksi,$query_tabel_barang_gambar);
	
	$query_tabel_stok_toko = "INSERT INTO tabel_stok_toko values('', '$kd_toko', '$kode', '$stok')";
	$hasil_tabel_stok_toko=mysqli_query($koneksi,$query_tabel_stok_toko);

	if($query_tabel_barang){
		if($query_tabel_barang_gambar){
			if($query_tabel_stok_toko){
				echo "<script>alert('Upload Produk Berhasil');setTimeout('location.href=`../page/index.php?menu=daftar_produk`', 1);</script>";
				// header("location:../page/index.php?menu=daftar_produk");
			}
			else{
				echo "<script>alert('Upload Produk Gagal');setTimeout('location.href=`../page/index.php?menu=daftar_produk`', 1);</script>";
				// header("location:../page/index.php?menu=daftar_produk");
			}
		}
		else{
			echo "<script>alert('Upload Produk Gagal');setTimeout('location.href=`../page/index.php?menu=daftar_produk`', 1);</script>";
			// header("location:../page/index.php?menu=daftar_produk");
		}
	}
	else{
		echo "<script>alert('Upload Produk Gagal');setTimeout('location.href=`../page/index.php?menu=daftar_produk`', 1);</script>";
		// header("location:../page/index.php?menu=daftar_produk");
	}
}

 ?>