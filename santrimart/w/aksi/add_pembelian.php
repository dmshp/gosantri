<?php 
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} 
// var_dump($_POST);
// die;

if(isset($_POST['add_pembelian'])){
	$id_user = $_SESSION['id_user'];

	$id = $_POST['kd_barang'];
	$jumlah = $_POST['jumlah'];
	$nomorFaktur = $_POST['faktur'];
	$total_pembelian = $_POST['harga'];
	$pengiriman = $_POST['pengiriman'];
	$biaya_total = $_POST['biaya_total'];
	$kd_supplier = "";
	$ket_pembelian = "Cash";
	$status = "";

	$ids = explode(",", $id);
	$jumlahs = explode(",", $jumlah);


	for ($i=0; $i < count($ids); $i++) {

		$query_stok = "SELECT  `stok` FROM `tabel_stok_toko` WHERE `kd_barang` = '$ids[$i]'";
		$stok = mysqli_fetch_array(mysqli_query($koneksi, $query_stok));
		$stok_awal = $stok['stok'];
		$stok = $stok_awal+$jumlahs[$i];

		$query = "UPDATE `tabel_stok_toko` SET `stok`='$stok' WHERE `kd_barang` = '$ids[$i]'";
		$hasil=mysqli_query($koneksi,$query);

		$query_tabel_barang = "SELECT * FROM `tabel_barang` WHERE `kd_barang` = '$ids[$i]'";
		$hasil_tabel_barang = mysqli_fetch_array(mysqli_query($koneksi, $query_tabel_barang));

		$harga = $hasil_tabel_barang['hrg_beli'];
		$total = intval($jumlahs[$i]) * intval($harga);

		$query = "INSERT INTO `tabel_rinci_pembelian`(`no_faktur_pembelian`, `kd_barang`, `jumlah`, `harga`, `sub_total_beli`) VALUES ('$nomorFaktur','$ids[$i]','$jumlahs[$i]','$harga','$total')";
		$hasil=mysqli_query($koneksi,$query);

	}
	if($hasil){
		$query = "INSERT INTO `tabel_pembelian`(`no_faktur_pembelian`, `kd_supplier`, `tgl_pembelian`, `id_user`, `total_pembelian`, `biaya_pengiriman`, `total_biaya`, `ket`, `status`) VALUES ('$nomorFaktur', '$kd_supplier', now(), '$id_user', '$total_pembelian', '$pengiriman', '$biaya_total', '$ket_pembelian', '$status')";
		$hasil=mysqli_query($koneksi,$query);

		if($hasil){
			header("Location: ../page/print_nota_pembelian.php?faktur=$nomorFaktur");
		}
	}
}




?>