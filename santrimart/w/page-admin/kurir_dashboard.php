<!-- BEGIN: Content-->
<?php 
$satQuery = "SELECT alamat, no_faktur_pembelian, total_pembelian, biaya_pengiriman, total_biaya, ket, latlng, tp.status FROM tabel_kurir tk, tabel_pembelian tp WHERE tk.id_kurir = $_SESSION[id_kurir] and tk.id_kurir = tp.id_kurir and tp.status IN ('pickup','dikirim')";
$executeSat = mysqli_query($koneksi, $satQuery);
$kurir = mysqli_fetch_array($executeSat);
// Order detail
if($kurir){ ?>
	<input type="hidden" id="openMap">
	<input type="hidden" id="statusOrder" value="<?= $kurir['status'] ?>">
	<div class="app-content content pt-0">
			<div class="content-overlay"></div>
					<section class="card">
							<div class="row">
									<div class="col-12">
										<div class="card-body">
												<div class="w-100 mb-1 position-relative" style="border-bottom: 1px solid #ccc;">
													<h3 class="d-inline-block">
														<i class="fas fa-map-marker d-inline-block text-primary"></i> Merchant
													</h3>
													<div class="d-inline-block float-right">
														<i class="fas fa-map text-danger" style="margin-top: -3px;margin-right: 17px;font-size: 1.51rem;"></i>
														<h6 class="position-absolute" onClick="openMap('toko')" style="font-size: 10px;top: 18px;right: 0;">google map</h6>
													</div>
												</div>
												<div>
													<input type="hidden" class="latlng_toko" value="<?= $latlng_toko ?>">
													<strong><?= $toko ?></strong>
													<div><?= $tlp_toko ?></div>
													<div class="mt-1"><?= $almt_toko ?></div>
												</div>
												<?php if($kurir['status'] == "pickup") { ?>
												<div class="blink_me text-danger mt-2">
													Merchant menunggu pesanan untuk dipickup
												</div>
												<?php } ?>
										</div>
									</div>
									<div class="col-12">
										<div class="w-100 mb-1 mt-1" style="border-bottom: 5px solid #ebebeb;">
										</div>
									</div>

									<div class="col-12">
										<div class="card-body pb-0">
												<div class="w-100 mb-1 position-relative" style="border-bottom: 1px solid #ccc;">
													<h3 class="d-inline-block">
														<i class="fas fa-map-marker d-inline-block text-warning"></i> Customer
													</h3>
													<div class="d-inline-block float-right">
														<i class="fas fa-map text-danger" style="margin-top: -3px;margin-right: 17px;font-size: 1.51rem;"></i>
														<h6 class="position-absolute" onClick="openMap('customer')" style="font-size: 10px;top: 18px;right: 0;">google map</h6>
													</div>
												</div>
												<div><?= $kurir['alamat'] ?></div>
												<input type="hidden" class="latlng_customer" value="<?= $kurir['latlng'] ?>">
										</div>
									</div>

									<div class="col-12">
										<div class="card-body pb-2 collapse-icon">
											
											<div class="accordion-shadow collapse-bordered p-0" id="accordionExample0">
												<div class="collapse-border-item collapse-header collapse-bordered">
														<div class="card-header p-1" id="heading200" data-toggle="collapse" role="button" data-target="#collapsepesanan" aria-expanded="false" aria-controls="collapsepesanan">
																<span class="lead collapse-title">
																		Detail Pesanan
																</span>
														</div>

														<div id="collapsepesanan" class="collapse" aria-labelledby="heading200" data-parent="#accordionExample0">
																<div class="card-body p-1">
																	
																	<div class="table-responsive">
																			<table class="table table-striped customtb">
																					<tbody>
																							<?php
																							$noFaktur = $kurir['no_faktur_pembelian'];
																							$ketQuery = "SELECT * FROM tabel_rinci_pembelian, tabel_barang_gambar, tabel_barang WHERE tabel_barang.kd_barang = tabel_rinci_pembelian.kd_barang AND tabel_barang.kd_barang = tabel_barang_gambar.id_brg AND no_faktur_pembelian = '$noFaktur'";
																							$executeSat = mysqli_query($koneksi, $ketQuery);
																							while ($b = mysqli_fetch_array($executeSat)) {
																									// print_r($b);
																									$e = explode(",", $b['gambar']);
																							?>
																							<tr>
																									<td><img src="../img/produk/<?php echo $e[0] ?>" width="50px" height="50px"></td>
																									<td>
																										<?php echo $b['nm_barang'] ?>
																										<div>Rp<?php echo number_format($b['harga'], 0, ",", "."); ?> x <?php echo $b['jumlah'] ?></div>
																									</td>
																									<td align="right">
																										Harga
																										<div style="font-weight:600;">Rp<?php echo number_format($b['sub_total_beli'], 0, ",", "."); ?></div>
																									</td>
																							</tr>
																							<?php } ?>
																					</tbody>
																					<tfoot>
																						<tr>
																							<td colspan=2 style="border-top: 1px dashed;">Total Pembelian : </td>
																							<td align="right" style="border-top: 1px dashed;">Rp<?= number_format($kurir['total_pembelian'], 0, ",", ".") ?></td>
																						</tr>
																						<tr>
																							<td colspan=2>Biaya Pengiriman : </td>
																							<td align="right">Rp<?= number_format($kurir['biaya_pengiriman'], 0, ",", ".") ?></td>
																						</tr>
																						<tr>
																							<td colspan=2 style="border-top: 1px dashed;font-weight: bold;font-size: 18px;">Total Belanja : </td>
																							<td align="right" style="border-top: 1px dashed;font-weight: bold;font-size: 18px;">Rp<?= number_format($kurir['total_biaya'], 0, ",", ".") ?></td>
																						</tr>
																					</tfoot>
																			</table>
																	</div>
																</div>
														</div>
												</div>
											</div>

											<?php if($kurir['status'] == "dikirim") { ?>
												<form method="post" action="../aksi/edit_kurir_status.php">
													<input type="hidden" name="pesanan_diterima" value="pesanan_diterima">
													<input type="hidden" name="biaya_pengiriman" value="<?= $kurir['biaya_pengiriman'] ?>">
													<input type="hidden" name="no_faktur_pembelian" value="<?= $kurir['no_faktur_pembelian'] ?>">
													<input type="submit" class="btn btn-success w-100 mt-1 waves-effect waves-light" value="Selesai Antar">
												</form>
											<?php } ?>
										</div>
									</div>
							</div>
						</div>
	
					</section>
	</div>
	
	<script>
		$(document).ready(function(){
			setInterval(getLocation, 10000);
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
			const statusOrder = $("#statusOrder").val();
			$.ajax({
					url: "../aksi/edit_kurir_status.php",
					type: "post",
					data: { lat: lat, lng: lng, interval_detail_order: "interval_detail_order" },
					success: function(text) {
						if(text != statusOrder){
							location.reload();
						}
					}
			})
		}

		function openMap(params) {
			$('#openMap').val(params);
			getLocationMap();
		}
		
		function getLocationMap() {
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(showPositionMap, showError);
			} else { 
				alert("Geolocation is not supported by this browser.");
			}
		}

		function showPositionMap(position) {
			console.log("masuk")
			const params = $('#openMap').val()
			const tujuan = $('.latlng_'+params).val();
			const latlng = position.coords.latitude + "," + position.coords.longitude;

			const url = "https://www.google.com/maps/dir/"+ latlng +"/" + tujuan
			window.open(url, "_blank");
		}

		function showError(error) {
			switch(error.code) {
				case error.PERMISSION_DENIED:
					alert("User denied the request for Geolocation.");
					break;
				case error.POSITION_UNAVAILABLE:
					alert("Location information is unavailable.");
					break;
				case error.TIMEOUT:
					alert("The request to get user location timed out.");
					break;
				case error.UNKNOWN_ERROR:
					alert("An unknown error occurred.");
					break;
			}
		}
	</script>

<?php }else{ //Status Kurir ?>
	<div class="app-content content pt-1">
			<div class="content-overlay"></div>
			<div class="text-center mt-1">
				<img src="../img/toko/<?php echo $logo;?>" width="100" height="100" />
				<h1><?= $toko ?></h1>
			</div>
			<div class="content-wrapper">
					<section id="statistics-card">
							<div class="row">
									<?php 
									$satQuery = "SELECT status FROM tabel_kurir WHERE `id_kurir` = $_SESSION[id_kurir]";
									$executeSat = mysqli_query($koneksi, $satQuery);
									$kurir = mysqli_fetch_array($executeSat)['status'];
									?>
									<div class="col-12">
										<div class="card text-center rounded">
											<div class="card-body">
													<label class="switch-custom">
														<input type="checkbox" <?= $kurir == 1 ? "checked" : "" ?> id="checkStatus">
														<span class="slider-custom round"></span>
													</label>
													<h4 class="text-bold-700 mt-1 kurir-status">
														<span class="<?= $kurir == 1 ? 'color-success' : 'color-danger' ?>">
														<?= $kurir == 1 ? "Aktif" : "Tidak Aktif" ?>
														</span>
													</h4>
													<p class="mb-0 line-ellipsis">Bila ingin menerima pesanan, ubah status menjadi <span class="color-success">Aktif</span> dengan mengklik tombol diatas</p>
											</div>
										</div>
									</div>
	
									<div class="col-12 list-order"></div>
	
							</div>
						</div>
	
					</section>
					<!-- // Statistics Card section end-->
	
			</div>
	</div>
	<!-- END: Content-->
	
	<script>
		//* jika diaktifkan :
		//	- update lokasi dan status
		//	- setInterval 10 detik
		//	- jika ada pesanan, bunyi alarm
		//* jika non aktif :
		//	- update lokasi dan status
		//	- interval berhenti
		var myInterval;
		var mySound = new Audio("../app-assets/bell.mp3");
		$(document).ready(function(){
	
			if($("#checkStatus:checked").length){
				getLocation();
				myInterval = setInterval(getLocation, 5000);
			}
	
			$('#checkStatus').change(function() {
					if(this.checked) {
						$(".kurir-status").html("<span class='color-success'>Aktif</span>");
						getLocation();
						myInterval = setInterval(getLocation, 5000);
					}else{
						$(".kurir-status").html("<span class='color-danger'>Tidak Aktif</span>");
						clearInterval(myInterval);
						getLocation()
					}
			});
		});
		
		function getLocation() {
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(showPosition);
			} else {
				const status = $("#checkStatus:checked").length;
				updateStatus("", "", status)
			}
		}
	
		function showPosition(position) {
			const status = $("#checkStatus:checked").length;
			updateStatus(position.coords.latitude, position.coords.longitude, status)
		}
	
		function updateStatus(lat = "", lng = "", status) {
			$.ajax({
					url: "../aksi/edit_kurir_status.php",
					type: "post",
					data: { lat: lat, lng: lng, status: status },
					success: function(text) {
						if(text == 0){
							if($("#checkStatus:checked").length){
								$(".list-order").html("<div class='card text-center'><div class='card-body'><div class='spinner-border text-primary mb-1 color-success' role='status'></div><div>Menunggu Orderan</div></div></div>");
							}else{
								$(".list-order").html("");
							}
						}
						else{
							mySound.play();
							$(".list-order").html(text);
							$(".alamat_user strong").remove()
							$(".alamat_user div:nth-child(1), .alamat_user p").remove()
							$("form").each(function (id) {
								$("form:nth-child(" + (id + 1) + ") .almt_user").html($("form:nth-child(" + (id + 1) + ") .alamat_user div:nth-child(1)").html())
							});
							$(".alamat_user div:nth-child(1)").remove()
						}
					}
			})
		}
	</script>
<?php
}
?>