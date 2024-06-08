<?php
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
}

$ketQuery = "SELECT * FROM tabel_member_alamat where user_id = ".$_GET['user_id']."
										order by status desc";
$executeSat = mysqli_query($koneksi, $ketQuery);
while ($x = mysqli_fetch_array($executeSat)) {
	$selected = "";
	$alamat_utama = '<span class="aksi-button" onClick="statusAlamat('.$x["id_alamat"].')">Jadikan Alamat Utama</span>
								<span class="div">&nbsp</span>';
	if($x["status"] == 1){
		$selected = "alamatutama";
		$alamat_utama = "";
		echo "<input type='hidden' id='latitude_user' value='".$x['latitude']."'>
					<input type='hidden' id='longitude_user' value='".$x['longitude']."'>";
		$cat = "";
		if($x['catatan'] != ""){
			$cat = "<p class='mb-0'>(Catatan: ".$x['catatan'].")</p>";
		}
		echo "<span class='hidden' id='alamat_checkout'>
						<strong>". $x['label'] ." ". $x['nama_penerima'] ."</strong>
						<div>". $x['no_telp'] ."</div>
						<div class='mt-1'>". $x['alamat'] ."</div>
						<div>". $x['wilayah'] ."</div>
						$cat
					</span>";
	}
	?>
		<div class="card <?= $selected ?>">
				<div class="d-block">
					<h4 class="card-body pb-0"><?= $x['label'] ?></h4>
					<div class="card-header justify-content-start pt-0">
							<h4 class="card-title"><?= $x['nama_penerima'] ?></h4>
							<div class="div">&nbsp</div>
							<div><?= $x['no_telp'] ?></div>
					</div>
					<div class="card-content">
							<div class="card-body actions" style="padding-top: 7px !important;">
									<p class="mb-0"><?= $x['alamat'] ?></p>
									<p class="mb-0"><?= $x['wilayah'] ?></p>
							</div>
							<div class="card-body pt-0">
								<span class="aksi-button" onClick="show(<?= $x["id_alamat"] ?>)">Ubah</span>
								<span class="div">&nbsp</span>
								<?= $alamat_utama ?>
								<span class="aksi-button" onClick="hapus(<?= $x["id_alamat"] ?>)">Hapus</span>
							</div>
					</div>
				</div>
				<div class="d-block">
					<i class="fas fa-check i-check hidden"></i>
				</div>
		</div>
<?php } ?>