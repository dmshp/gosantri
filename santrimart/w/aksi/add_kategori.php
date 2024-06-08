<head>
    <!-- SweetAlert -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
    <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <script src="../app-assets/js/jquery3.6.0.min.js"></script>
    <script src="../app-assets/js/sweetalert2@11.js"></script>
</head>

<?php 
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 
// var_dump($_POST);
// var_dump($_FILES);
// die;

$inesial 	 	 = $_POST['inesial'];
$id_user     = $_SESSION['id_user'];
$kode_user   = $_SESSION['kode_user'];
$nm_user     = $_SESSION['nm_user'];

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


if(isset($_POST['add_kategori'])){
	$nama = $_POST['kategori'];

	$sql = mysqli_query($koneksi, "SELECT * FROM tabel_kategori_barang WHERE inesial = '$inesial' OR nm_kategori = '$nama'");
    $jml_inesial = mysqli_num_rows($sql);

  if ($jml_inesial>0) {
      echo '<script>
              setTimeout(function() {
                  Swal.fire({
                      icon: "error",
                      tittle: "GAGAL SIMPAN",
                      text: "Data Inesial / Nama Kategori Sudah Ada!!",
                  }).then(function() {
                      history.back();
                  });
              }, 1);
          </script>';
  } else {

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
			// echo "<script>alert('Tambah Image Kategori');history.back()</script>";
		}
		else{	
			// cek ekstensi
			$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
			$ekstensiGambar = explode(".", $image_name);
			$ekstensiGambar = strtolower(end($ekstensiGambar));
			
			if( !in_array($ekstensiGambar, $ekstensiGambarValid) ){
				echo '<script>
	                setTimeout(function() {
	                    Swal.fire({
	                        icon: "warning",
	                        tittle: "GAGAL.",
	                        text: "Hanya Menerima ekstensi jpg, jpeg dan png",
	                    }).then(function() {
	                        history.back();
	                    });
	                }, 1);
	            </script>';

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

			
			// simpan gambar
			// move_uploaded_file($image_tmp, '../img/kategori/'.$image_name_new);
			// echo $nama.$form.$image_name_new;
		}

		// var_dump($image_name_new);


		$query = "INSERT INTO tabel_kategori_barang values('','$inesial','$nama','$form','$image_name_new','$varian')";
		$hasil=mysqli_query($koneksi,$query);
		// echo $hasil;
		if($query){
				echo '<script>
	                setTimeout(function() {
	                    Swal.fire({
	                        icon: "success",
	                        tittle: "BERHASIL.",
	                        text: "Kategori berhasil di simpan.",
	                    }).then(function() {
	                        history.back();
	                    });
	                }, 1);
	            </script>';
			}

		}

}

 ?>