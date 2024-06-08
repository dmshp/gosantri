	<div class="app-content content pt-1">
			<div class="content-overlay"></div>
			<div class="content-wrapper">
					<section id="statistics-card">
							<div class="row">
									<?php 
									//debet jika status 1, kredit jika status 1 atau status 0 saat penarikan
									$kurir = mysqli_fetch_array(mysqli_query($koneksi, "SELECT SUM(CASE WHEN arus=0 and status=1 THEN `nominal` END) as saldo, SUM(CASE WHEN (arus=1 and status=1) or (arus=1 and status=0 and no_faktur_pembelian='') THEN `nominal` END) as wd FROM `tabel_keuangan` WHERE `id_member`=$_SESSION[id_user]"));
									$saldo = $kurir['saldo'] - $kurir['wd'];
									?>
									<div class="col-12">
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
											<?php $rekening = mysqli_fetch_array(mysqli_query($koneksi, "SELECT bank,an_rekening,no_rekening,tk.status FROM tabel_member mb, tabel_kurir tk WHERE mb.id_user and tk.id_user and mb.id_user = '$_SESSION[id_user]'"));  ?>
											<input type="hidden" value="<?= $rekening['status'] ?>" id="status_kurir">

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
	
	
							</div>
						</div>
	
					</section>
					<!-- // Statistics Card section end-->
	
			</div>
	</div>
	<!-- END: Content-->
	
	<script>
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
		
		$(document).ready(function(){
			if($("#status_kurir").val() == 1){
				getLocation();
				setInterval(getLocation, 5000);
			}
		});
		
		
		function getLocation() {
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(showPosition);
			} else {
				updateStatus("", "")
			}
		}
	
		function showPosition(position) {
			updateStatus(position.coords.latitude, position.coords.longitude)
		}
	
		function updateStatus(lat = "", lng = "") {
			$.ajax({
					url: "../aksi/edit_kurir_status.php",
					type: "post",
					data: { lat: lat, lng: lng, status: 1 },
					success: function(text) {
						if(text != 0){
							Swal.fire(
								'Status aktif',
								'terima orderan / non aktifkan status',
								'warning'
							)
							setTimeout(() => {
								location.replace("index.php?menu=home");
							}, 3000);
						}
					}
			})
		}
	</script>