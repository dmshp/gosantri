<?php
// Defining variables
include "../inc/koneksi.php";
?>
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0 text-dark text-capitalize">
                            <?php echo $_SESSION['akses']; ?></h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php?menu=home" class="text-dark">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#" class="text-dark">Saldo</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="divider">
                    <div class="divider-text">
                        <h3 class="mb-3 display-4 text-uppercase">Saldo</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-12 pb-5">
											
											<?php 
											$id_user = $_SESSION['id_user'];
											//debet jika status 1, kredit jika status 1 atau status 0 saat penarikan
											$kurir = mysqli_fetch_array(mysqli_query($koneksi, "SELECT SUM(CASE WHEN arus=0 and status=1 THEN `nominal` END) as saldo, SUM(CASE WHEN (arus=1 and status=1) or (arus=1 and status=0 and no_faktur_pembelian='') THEN `nominal` END) as wd FROM `tabel_keuangan` WHERE `id_member`=$id_user"));
											$saldo = $kurir['saldo'] - $kurir['wd'];
											?>

												<div class="card rounded">
													<div class="card-body text-center">
															<h6 class="text-bold-300">Saldo Penghasilan</h6>
															<h1 class="text-bold-500 mt-1 color-success" style="font-size: 3rem;font-family: 'Open Sauce One',sans-serif;">
																<span style="font-size: 1.5rem;">Rp </span><?= number_format($saldo, 0, ",", "."); ?>
															</h1>
															<input type="hidden" value="<?= $saldo ?>" id="saldo"/>
													</div>
													<div class="w-100 mb-1 mt-1" style="border-bottom: 5px solid #ebebeb;"></div>
													<div class="card-body">
															<h6 class="text-bold-300 mb-1" style="border-bottom: 1px solid #37e8fc;padding-bottom: 6px;width: 145px;">Nominal Penarikan</h6>
															<fieldset class="form-label-group form-group position-relative has-icon-left">
																	<div class="form-control-position">
																			<span>Rp</span>
																	</div>
																	<input type="text" class="form-control" id="nominal" required>
																	<label for="user-name" style="top: 38px !important;left: 8px !important;">Minimum penarikan 50.000</label>
															</fieldset>
													</div>
													<div class="w-100" style="border-bottom: 2px solid #ebebeb;"></div>
													<?php $rekening = mysqli_fetch_array(mysqli_query($koneksi, "SELECT bank,an_rekening,no_rekening FROM tabel_member WHERE id_user = '$_SESSION[id_user]'")); ?>

													<div class="card-body">
															<h6 class="text-bold-300 mb-1" style="border-bottom: 1px solid #37e8fc;padding-bottom: 6px;width: 130px;">Rekening Tujuan</h6>
															<div>
																<div class="font-weight-bold" style="margin-bottom:-7px;">Bank <?= $rekening['bank'] ?></div>
																<div><?= $rekening['no_rekening'] ?> <span style="font-size: 70px;line-height: 0;">.</span> <?= $rekening['an_rekening'] ?></div>
															</div>
													</div>
													<div class="w-100" style="border-bottom: 2px solid #ebebeb;margin-bottom: -17px;"></div>
													<div class="card-body">
														<button onClick="tarik()" class="btn btn-success w-100 mt-1 waves-effect waves-light">Tarik Saldo</button>
													</div>
												</div>
                    </div>
                    <div class="col-lg-8 col-12">
                        <div class="badge badge-primary float-right">
                           <?php
														$sql_user = mysqli_query($koneksi, "SELECT * FROM tabel_keuangan WHERE id_member = '$id_user'");
														$jumlah_user = mysqli_num_rows($sql_user);
                            ?>
                            <span class="badge badge-pill badge-up badge-danger font-small-2 mr-2">
                                <?php echo $jumlah_user; ?>
                            </span>
                            Total Saldo
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Faktur</th>
                                        <th>Status</th>
                                        <th>Kredit</th>
                                        <th>Debet</th>
                                        <th>Saldo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $ketQuery = "SELECT * FROM tabel_keuangan WHERE id_member = '$id_user' order by id_keuangan asc";
                                        $executeSat = mysqli_query($koneksi, $ketQuery);
																				$total_saldo = 0; $data = [];
																				//menyimpan data laporan
                                        while ($b = mysqli_fetch_array($executeSat)) {
                            							$debet = 0; $kredit = 0;
																					$status = $b['status'] == 0 ? 'pending' : ($b['status'] == 1 ? 'sucess' : 'batal');
																					
																					if ($b['arus'] == 0) {
																						$debet = $b['nominal'];
																					} else if ($b['arus'] == 1) {
																						$kredit = $b['nominal'];
																					}
																					
																					if($b['status'] == 1 || ($b['status'] == 0 && !$b['no_faktur_pembelian'])){ 
																						if ($b['arus'] == 0) {
																								$total_saldo = $total_saldo + $b['nominal'];
																						} else if ($b['arus'] == 1) {
																								$total_saldo = $total_saldo - $b['nominal'];
																						}
																					}
																					$b['no_faktur_pembelian'] = !$b['no_faktur_pembelian'] ? 'Penarikan' : ($b['arus'] == 1 ? $b['no_faktur_pembelian'] . ' (admin) ': $b['no_faktur_pembelian']);
																					array_push($data,'<tr class="'.$status.'">
																							<td>' . $b['tanggal'] . '</td>
																							<td>' . $b['no_faktur_pembelian'] . '</td>
																							<td>' . $status . '</td>
																							<td>Rp ' . number_format($kredit, 0, ",", ".") . '</td>
																							<td>Rp ' . number_format($debet, 0, ",", ".") . '</td>
																							<td>Rp ' . number_format($total_saldo, 0, ",", ".") . '</td>
																					</tr>');
																				}
																				//laporan data direverse
																				$data = array_reverse($data,true);
																				foreach($data as $d){
																						echo $d;
																				};
																				 ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!-- END: Content-->
            </div>
        </div>
    </div>
</div>

<script>	
$(document).ready(function () {
	$(".table-striped").DataTable({
		"ordering": false
	});
});

function tarik() {
	const nominal = parseInt($("#nominal").val());
	const saldo = parseInt($("#saldo").val());
	if(nominal < 50000){
		Swal.fire(
			'Nominal Penarikan',
			'minimal 50.000',
			'error'
		)
		return false;
	}
	if(nominal > saldo){
		Swal.fire(
			'Nominal Penarikan',
			'melebihi saldo',
			'error'
		)
		return false;
	}

	$.ajax({
			url: "../aksi/withdraw.php",
			type: "post",
			data: { nominal: nominal },
			success: function(text) {
				if(text == 1){
					Swal.fire(
						'Berhasil Tarik Saldo',
						'',
						'success'
					)
					setTimeout(() => {
						location.reload();
					}, 2000);
				}else{
					Swal.fire(
						'Gagal',
						text,
						'error'
					)
				}
			}
	})
}
</script>