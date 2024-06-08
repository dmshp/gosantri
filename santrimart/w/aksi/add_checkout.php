<?php
include "../inc/koneksi.php";
session_start();

$idUser = $_SESSION['id_user'];


$query_user = "SELECT * FROM `tabel_member` WHERE `id_user` = '$idUser'";
$hasil_user_details = mysqli_fetch_array(mysqli_query($koneksi, $query_user));
$a_n = $hasil_user_details['nm_user'];
$hp = $hasil_user_details['hp'];

$jarak = $_POST['jarak'];
$durasi = $_POST['durasi'];
$cara_bayar = $_POST['cara_bayar'];
$alamat = $_POST['alamat'];
$latlng = $_POST['latlng'];
$faktur = $_POST['faktur_jual'];
$fakturBeli = $_POST['faktur_beli'];
$ids = $_POST['kd_barang'];
$biaya_kirim = $_POST['biaya_kirim'];
$harga_barang_total = $_POST['harga_barang'];
$jumlah = $_POST['quantity'];
$total_biaya = $_POST['total_penjualan'];
$kd_supplier = "";
$dp = "";
$sisa = "";
$merchant = "";
$data_keuangan = "";

// var_dump($jarak);
// var_dump($durasi);
// var_dump($cara_bayar);
// var_dump($alamat);
// var_dump($latlng);
// var_dump($faktur);
// var_dump($fakturBeli);
// var_dump($ids);
// var_dump($biaya_kirim);
// var_dump($harga_barang_total);
// var_dump($jumlah);
// var_dump($total_biaya);de();

$query_pembayaran = "SELECT kd_pembayaran, p.kd_kategori_pembayaran, nm_kategori_pembayaran, bank FROM `tabel_pembayaran` as p,tabel_kategori_pembayaran as kp WHERE p.`kd_kategori_pembayaran`=kp.`kd_kategori_pembayaran` and  p.`kd_pembayaran`='$cara_bayar'";
$pembayaran = mysqli_fetch_array(mysqli_query($koneksi, $query_pembayaran));
// var_dump($cara_bayar);
// var_dump($pembayaran['kd_kategori_pembayaran']);
// die();

//jika transfer status unpaid
if($pembayaran['kd_kategori_pembayaran'] == 1){
	$status = "unpaid";
}
//jika wallet status dikemas, jika saldo cukup
else if($pembayaran['kd_kategori_pembayaran'] == 2){
	
	$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT SUM(CASE WHEN arus=0 and status=1 THEN `nominal` END) as saldo, SUM(CASE WHEN (arus=1 and status=1) or (arus=1 and status=0 and no_faktur_pembelian='') THEN `nominal` END) as wd FROM `tabel_keuangan` WHERE `id_member`=$idUser"));
	$saldo = $data['saldo'] - $data['wd'];
	$subtotal = 0;
	for ($i = 0; $i < count($ids); $i++) {
			$query_tabel_barang = "SELECT * FROM `tabel_barang` WHERE `kd_barang` = '$ids[$i]'";
			$hasil_tabel_barang = mysqli_fetch_array(mysqli_query($koneksi, $query_tabel_barang));
			$harga = $hasil_tabel_barang['hrg_jual'];
			$subtotal += intval($jumlah[$i]) * intval($hasil_tabel_barang['hrg_jual']);
	}
	$subtotal += $biaya_kirim;
	//jika saldo kurang
	if($subtotal > $saldo){
		echo "Saldo kurang";
		die();
	}
	//insert data keuangan
	$data_keuangan = ", ('$idUser',NOW(),'$subtotal',1,'$fakturBeli',0)";

	$status = "dikemas";
}
//jika Payment Gateway status diawal adalah proses bayar
else if($pembayaran['kd_kategori_pembayaran'] == 4){
	$status = "proses bayar";
}
//jika cod status check admin
else{
	$status = "check";
}

$ket_pembayaran = $pembayaran['nm_kategori_pembayaran'] . ", " . $pembayaran['bank'];
$pembayaran = $pembayaran['kd_pembayaran'];


for ($i = 0; $i < count($ids); $i++) {
    $query_tabel_barang = "SELECT * FROM `tabel_barang` WHERE `kd_barang` = '$ids[$i]'";
    $hasil_tabel_barang = mysqli_fetch_array(mysqli_query($koneksi, $query_tabel_barang));
		$merchant = $hasil_tabel_barang['kd_merchant'];

    $namaBarang = $hasil_tabel_barang['nm_barang'];


    $ukuran = "";
    $harga = $hasil_tabel_barang['hrg_jual'];

    $subtotal = intval($jumlah[$i]) * intval($hasil_tabel_barang['hrg_jual']);
    $diskon = "";
    $ket = "";
    $stts = "PROSES";
    $alamat_akhir = "";


    $query_stok = "SELECT  `stok` FROM `tabel_stok_toko` WHERE `kd_barang` = '$ids[$i]'";
    $stok = mysqli_fetch_array(mysqli_query($koneksi, $query_stok));
    $stok_awal = $stok['stok'];
    $stok = $stok_awal - $jumlah[$i];

    $query_update = "INSERT INTO `tabel_rinci_penjualan`(`no_faktur_penjualan`, `kd_barang`, `nm_barang`, `no_hp`, `ukuran`, `jumlah`, `stok_awal`, `harga`, `sub_total_jual`, `diskon`, `a_n`, `keterangan`, `stts`, `alamat`, `alamat_akhir`) VALUES ('$faktur','$ids[$i]','$namaBarang','$hp','$ukuran','$jumlah[$i]','$stok_awal','$harga','$subtotal','$diskon','$a_n','$ket','$stts','$alamat','$alamat')";
    $hasil = mysqli_query($koneksi, $query_update);

    $query_update = "INSERT INTO `tabel_rinci_pembelian`(`no_faktur_pembelian`, `kd_barang`, `jumlah`, `harga`, `sub_total_beli`) VALUES ('$fakturBeli','$ids[$i]','$jumlah[$i]','$harga','$subtotal')";
    $hasil = mysqli_query($koneksi, $query_update);
    // print_r($hasil);
    $query_update = "UPDATE `tabel_stok_toko` SET `stok` = '$stok'  WHERE kd_barang = '$ids[$i]'";
    $hasil = mysqli_query($koneksi, $query_update);
}

$query_penjualan = "INSERT INTO `tabel_penjualan` (`no_faktur_penjualan`, `kd_supplier`, `tgl_penjualan`, `id_user`, `total_penjualan`,`biaya_pengiriman`,`total_biaya`,`dp`, `sisa`, `ket`, `status`,`nama_penerima`,`kontak`,`alamat`) VALUES ('$faktur','$kd_supplier',NOW(),'$idUser','$harga_barang_total','$biaya_kirim','$total_biaya','$dp','$sisa','$ket_pembayaran','$status','$a_n','$hp','$alamat')";
$n = mysqli_query($koneksi, $query_penjualan);

$query_pembelian = "INSERT INTO `tabel_pembelian` (`no_faktur_pembelian`, `kd_supplier`, `tgl_pembelian`, `id_user`, `total_pembelian`,`biaya_pengiriman`,`total_biaya`, `ket`,`status`,`pembayaran`,`kontak`,`alamat`,`latlng`,`jarak`,`durasi`) VALUES ('$fakturBeli','$kd_supplier',NOW(),'$idUser','$harga_barang_total','$biaya_kirim','$total_biaya','$ket_pembayaran','$status','$pembayaran','$hp','$alamat','$latlng','$jarak','$durasi')";
$b = mysqli_query($koneksi, $query_pembelian);

$merchant = mysqli_fetch_array(mysqli_query($koneksi, "SELECT biaya, id_user FROM `tabel_merchant` WHERE kd_merchant='$merchant'"));

$fee = $harga_barang_total * $merchant['biaya'] / 100;
$merchant_id = $merchant['id_user'];

$query_keuangan = "INSERT INTO `tabel_keuangan` (`id_member`, `tanggal`, `nominal`, `arus`, `no_faktur_pembelian`, `status`) VALUES ('$merchant_id',NOW(),'$harga_barang_total',0,'$fakturBeli',0), ('$merchant_id',NOW(),'$fee',1,'$fakturBeli',0) $data_keuangan";
$b = mysqli_query($koneksi, $query_keuangan);

$query_delete = "DELETE FROM keranjang WHERE id_member = $idUser";
$success_delete = mysqli_query($koneksi, $query_delete);