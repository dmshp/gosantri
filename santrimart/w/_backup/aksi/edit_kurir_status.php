<?php
session_start();

include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
}

$id_kurir = $_SESSION['id_kurir'];
//Interval detail order
if(isset($_POST['interval_detail_order'])){
	$lat = $_POST['lat'];
	$lng = $_POST['lng'];
	$posisi = $lat . "," . $lng;
	$query_tabel_kurir = "UPDATE tabel_kurir SET posisi='$posisi', current_active=NOW() WHERE id_kurir='$id_kurir'";
	$hasil_tabel_kurir = mysqli_query($koneksi, $query_tabel_kurir);

	$query_tabel_pembelian = "SELECT status FROM tabel_pembelian WHERE id_kurir = '$id_kurir'";
	$hasil_tabel_pembelian = mysqli_query($koneksi, $query_tabel_pembelian);
	$status = mysqli_fetch_array($hasil_tabel_pembelian)['status'];

	echo $status;
}
//Proses terima order
else if(isset($_POST['terima_order'])){
	$faktur = $_POST['no_faktur_pembelian'];
	$query_tabel_pembelian = "SELECT * FROM tabel_pembelian WHERE no_faktur_pembelian='$faktur' and status='driver' and id_kurir = 0";
	$data = mysqli_fetch_array(mysqli_query($koneksi, $query_tabel_pembelian));
	//pengechekan jika pesanan sudah dipickup kurir lain atau tidak
	if($data){
		$query_tabel_pembelian = "UPDATE tabel_pembelian SET status='pickup', id_kurir='$id_kurir' WHERE no_faktur_pembelian='$faktur'";
		mysqli_query($koneksi, $query_tabel_pembelian);
		$query_tabel_kurir = "UPDATE tabel_kurir SET status='2' WHERE id_kurir='$id_kurir'";
		mysqli_query($koneksi, $query_tabel_kurir);
		echo "<script>location.replace(document.referrer);</script>";
	}else{
		echo "<script>alert('Pesanan sudah dipickup kurir lain');location.replace(document.referrer);</script>";
	}
//proses customer menerima pesanan
}else if(isset($_POST['pesanan_diterima'])){
	$id_user = $_SESSION['id_user'];
	$faktur = $_POST['no_faktur_pembelian'];
	$biaya_pengiriman = $_POST['biaya_pengiriman'];
	$query_keuangan = "INSERT INTO `tabel_keuangan` (`id_member`, `tanggal`, `nominal`, `arus`, `no_faktur_pembelian`, `status`) VALUES ('$id_user',NOW(),'$biaya_pengiriman',0,'$faktur',0)";
	$b = mysqli_query($koneksi, $query_keuangan);
	$query_tabel_kurir = "UPDATE tabel_kurir SET status='1' WHERE id_kurir='$id_kurir'";
	mysqli_query($koneksi, $query_tabel_kurir);
	$query_tabel_pembelian = "UPDATE tabel_pembelian SET status='diterima', id_kurir='$id_kurir' WHERE no_faktur_pembelian='$faktur'";
	$hasil_tabel_pembelian = mysqli_query($koneksi, $query_tabel_pembelian);
	if($hasil_tabel_pembelian){
		echo "<script>location.replace(document.referrer);</script>";
	}else{
		echo "<script>alert('Gagal');location.replace(document.referrer);</script>";
	}

}else{ //Proses aktif non aktif status kurir
	
		$lat = $_POST['lat'];
		$lng = $_POST['lng'];
		$posisi = $lat . "," . $lng;
		$status = $_POST['status'];
	
		$query_tabel_kurir = "UPDATE tabel_kurir SET posisi='$posisi', status='$status', current_active=NOW() WHERE id_kurir='$id_kurir'";
		$hasil_tabel_kurir = mysqli_query($koneksi, $query_tabel_kurir);
		if ($hasil_tabel_kurir) {
				//Jika status aktif
				if($status){
					$a = mysqli_fetch_array(mysqli_query($koneksi, "SELECT nm_toko, almt_toko, tlp_toko FROM `tabel_toko`"));
					$toko			= $a['nm_toko'];
					$almt_toko		= $a['almt_toko'];
					$tlp_toko		= $a['tlp_toko'];
					$query_tabel_pembelian = "SELECT no_faktur_pembelian, alamat, biaya_pengiriman, jarak FROM tabel_pembelian tp WHERE status='driver' and id_kurir = 0 order by tgl_pembelian asc";
					$hasil_tabel_pembelian = mysqli_query($koneksi, $query_tabel_pembelian);
					$no = 0;
					while($o = mysqli_fetch_array($hasil_tabel_pembelian)){
						$no++;
						?>
						<form method="post" action="../aksi/edit_kurir_status.php">
							<input type="hidden" name="no_faktur_pembelian" value="<?= $o['no_faktur_pembelian'] ?>">
							<div class="card text-center">
								<div class="card-body">
									<div class="text-left mb-1 alamat_div">
										<i class="fas fa-map-marker d-inline-block text-primary"></i>
										<h5 class="ml-1 d-inline-block font-weight-bold almt_user"></h5>
										<div style="margin: 5px 0 0 25px;" class="alamat_user"><?= $o["alamat"] ?></div>
									</div>
									<div class="text-left">
										<i class="fas fa-map-marker d-inline-block text-warning"></i>
										<h5 class="ml-1 d-inline-block font-weight-bold"><?= $toko ?></h5>
										<div style="margin: 5px 0 0 25px;"><?= $almt_toko ?></div>
									</div>
									<hr style="border: 1px dashed #ccc!important;">
									<div class="row">
										<div class="col-6">
											<div class="text-center mb-1">Tarif</div>
											<h4 class="text-center">Rp. <?= number_format($o['biaya_pengiriman'], 0, ",", ".") ?></h4>
										</div>
										<div class="col-6">
											<div class="text-center mb-1">Jarak</div>
											<h4 class="text-center"><?= number_format($o['jarak'], 0, ",", ".") ?> KM</h4>
										</div>
									</div>
									<input type="hidden" name="terima_order" value="terima_order">
									<input type="submit" name="terima_order" class="btn btn-success w-100 mt-1 waves-effect waves-light" style="background-color: #28C76F !important;" value="Ambil Orderan">
								</div>
							</div>
						</form>
					<?php
					}
	
					if($no == 0){
						echo $no;
					}
				}else{
					echo 0;
				}
		} else {
				echo $hasil_tabel_kurir;
		}

}
