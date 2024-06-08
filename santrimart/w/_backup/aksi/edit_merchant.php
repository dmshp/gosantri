<?php
session_start();

//var_dump($_SESSION['nm_user']);
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 

if(isset($_POST['edit_fee'])){
	$kd_merchant = $_POST['kd_merchant'];
	$biaya = $_POST['biaya'];

	$query_tabel_merchant = "UPDATE tabel_merchant SET biaya='$biaya' WHERE kd_merchant='$kd_merchant'";
	$hasil_tabel_merchant = mysqli_query($koneksi, $query_tabel_merchant);
	if ($hasil_tabel_merchant) {
			echo "Berhasil Update Status Order";
	} else {
			echo $hasil_tabel_merchant;
	}
}else if (isset($_POST['update_profile'])) {
		$lat_pin = $_POST['lat_pin'];
		$lng_pin = $_POST['lng_pin'];
		$nm_merchant = $_POST['nm_merchant'];
		$hp = $_POST['hp'];
		$alamat_user = $_POST['alamat_user'];
		$id_user = $_SESSION['id_user'];

    if ($_FILES['image']['name'] != null) {
        $header_name = $_FILES['image']['name'];
        $header_size = $_FILES['image']['size'];
        $header_tmp = $_FILES['image']['tmp_name'];
        $header_error = $_FILES['image']['error'];

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
        if ($header_size > 100000) {
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
        $query_tabel_member = "UPDATE `tabel_member` SET `foto`='$header_name_new', `hp`='$hp',`alamat_user`='$alamat_user' WHERE `id_user` = '$id_user'";
    } else {
        $query_tabel_member = "UPDATE `tabel_member` SET `hp`='$hp',`alamat_user`='$alamat_user' WHERE `id_user` = '$id_user'";
    }
		$query_tabel_merchant = "UPDATE `tabel_merchant` SET `nm_merchant`='$nm_merchant', latitude='$lat_pin', longitude='$lng_pin' WHERE `id_user` = '$id_user'";
    $hasil_tabel_merchant = mysqli_query($koneksi, $query_tabel_merchant);
    $hasil_tabel_member = mysqli_query($koneksi, $query_tabel_member);
		echo "<script>alert('Edit Merchant Berhasil');history.back()</script>";
}
