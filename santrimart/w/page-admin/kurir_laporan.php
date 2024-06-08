	
  <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/ui/prism.min.css">
	<div class="app-content content pt-1">
			<div class="content-overlay"></div>
			<div class="content-wrapper pt-0">
					<section id="statistics-card">
							<div class="row">
								<div class="col-12" style="margin-bottom: -15px;">
										<div class="card rounded">
											<div class="card-body text-center">
													<h2 class="text-bold-300">Laporan Transaksi</h2>
											</div>
										</div>
								</div>
								<?php $rekening = mysqli_fetch_array(mysqli_query($koneksi, "SELECT status FROM tabel_kurir WHERE id_kurir = '$_SESSION[id_kurir]'")); ?>
								<input type="hidden" value="<?= $rekening['status'] ?>" id="status_kurir">

								<?php 
									$kurir = mysqli_query($koneksi, "SELECT tk.*, tp.alamat 
									FROM `tabel_keuangan` tk
									LEFT JOIN tabel_pembelian tp on tk.no_faktur_pembelian = tp.no_faktur_pembelian 
									WHERE `id_member`=$_SESSION[id_user] order by id_keuangan asc");
									$saldo = 0;
									$data = [];
									//menyimpan data laporan
									while ($lp = mysqli_fetch_array($kurir)) {
										$status = $lp['status'] == 0 ? 'pending' : ($lp['status'] == 2 ? 'batal' : '');
										$saldo_akhir = '';
										if($lp['status'] == 1 || ($status == 'pending' && !$lp['alamat'])){ 
											$saldo = $lp['arus'] ? $saldo - $lp['nominal'] : $saldo + $lp['nominal'];
											$saldo_akhir = '<span>Saldo akhir Rp ' . number_format($saldo, 0, ",", ".") . '</span>'; 
										}
										$lp['no_faktur_pembelian'] = $lp['no_faktur_pembelian'] ? 'ID ' . $lp['no_faktur_pembelian'] : 'Penarikan' ;
										if($lp['alamat']){ 
											$alamat = '<div class="alamat_user hidden alamatcss">' . $lp['alamat'] . '</div>';
										}else{ $alamat = '' ;}
										$color = $lp['arus'] ? 'danger' : 'success';
										$icon = $lp['arus'] ? 'left' : 'right';
										array_push($data,'<div class="col-12" id="boxlaporan">
																				<div class="prism-show-language"><div class="prism-show-language-label">' . $lp['tanggal'] . '</div></div>
																				<pre class="language-html pt-0 '.$status.'">
																					<div class="saldocss color-'.$color.'"><i class="fas fa-arrow-circle-'.$icon.'"></i> Rp ' . number_format($lp['nominal'], 0, ",", ".") . '</div>
																					<div class="fakturcss">' . $lp['no_faktur_pembelian'] . '</div>
																					'.$alamat.'
																					<div class="saldoakhircss">'.$saldo_akhir.' <span class="float-right font-italic">'.$status.'</span></div>
																				</pre>
																			</div>');
									}
									//laporan data direverse
									$data = array_reverse($data,true);
									foreach($data as $d){
											echo $d;
									};
									?>
							</div>
						</div>
	
					</section>
					<!-- // Statistics Card section end-->
	
			</div>
	</div>
	<!-- END: Content-->
	<script>
		$(document).ready(function(){
			if($("#status_kurir").val() == 1){
				getLocation();
				setInterval(getLocation, 5000);
			}
			
			$(".alamat_user strong").remove()
			$(".alamat_user div:nth-child(1), .alamat_user div:nth-child(3), .alamat_user p").remove()
			$(".alamat_user").removeClass("hidden")
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